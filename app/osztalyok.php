<?php session_start();

    class AdatbazisCsatl {
        static $conn;

        public static function Csatlakozas() {
            self::$conn = new PDO("mysql:host=localhost;dbname=adomany_oldal;charset=utf8;", "root", "");
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        public static function GetCsatlakozas() {
            return self::$conn;
        }
    }

    AdatbazisCsatl::Csatlakozas();

    class FelhasznaloKezelo {
        private $kNev;
        private $vNev;
        private $becenev;
        private $email;
        private $tel;
        private $jelszo;
        private $conn;

        function __construct($kNev = "", $vNev = "", 
        $becenev = "", $email = "",
        $tel = "", $jelszo = "") {
            $this->kNev = $kNev;
            $this->vNev = $vNev;
            $this->becenev = $becenev;
            $this->email = $email;
            $this->tel = $tel;
            $this->jelszo = $jelszo;
            $this->conn = AdatbazisCsatl::GetCsatlakozas();
        }

        public function FRegisztral() {
            $errors = [];

            if (mb_strlen($this->vNev) < 2)
                $errors[] = "A vezetéknévnek legalább 2 karakteresnek kell lennie!";
            if (mb_strlen($this->kNev) < 3)
                $errors[] = "A keresztnévnek legalább 3 karakteresnek kell lennie!";
            //email validáció
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL))
                $errors[] = "Az email cím nem megfelelő formátumú!";
            if (mb_strlen($this->jelszo) < 8)
                $errors[] = "A jelszónak legalább 8 karakteresnek kell lennie!";

            //*ha nincs hiba
            if (empty($errors)) {
                $stmt = $this->conn->prepare("INSERT INTO 
                felhasznalok (FelhTipus, FelhNev, Email, Jelszo) 
                VALUES (?,?,?,?)");

                $stmt2 = $this->conn->prepare("INSERT INTO felh_profil 
                (FelhID, Keresztnev, Vezeteknev, Tel, Fabatka) 
                VALUES(?,?,?,?,?)");

                $stmt->execute([
                    1, $this->becenev, 
                    $this->email, 
                    hash("sha512", $this->jelszo), 
                ]);

                $stmt2->execute([
                    $this->conn->lastInsertId(),
                    $this->kNev,
                    $this->vNev,
                    $this->tel,
                    25000
                ]);

                return json_encode(true);
            }

            return json_encode($errors);
        }

        public function Regisztral($nev, $leiras, $email, $jelszo) {
            $errors = [];

            if (mb_strlen($nev) < 2)
                $errors[] = "A vezetéknévnek legalább 2 karakteresnek kell lennie!";
            if (mb_strlen($leiras) < 3)
                $errors[] = "A keresztnévnek legalább 3 karakteresnek kell lennie!";
            //email validáció
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                $errors[] = "Az email cím nem megfelelő formátumú!";
            if (mb_strlen($jelszo) < 8)
                $errors[] = "A jelszónak legalább 8 karakteresnek kell lennie!";

            //*ha nincs hiba
            if (empty($errors)) {
                $stmt = $this->conn->prepare("INSERT INTO adomanyszerv (nev, leiras, email, jelszo) VALUES(?,?,?,?)");

                $stmt->execute([
                    $nev, 
                    $leiras,
                    $email, 
                    hash("sha512", $jelszo)
                ]);

                //kilépünk a függvényből
                return json_encode(true);
            }

            return json_encode($errors);
        }

        public function Bejelentkez($email, $jelszo) {
            $stmt = $this->conn->prepare("SELECT * FROM 
            felhasznalok WHERE Email = ? AND Jelszo = ?");
            
            $stmt->execute([
                $email,
                hash("sha512", $jelszo)
            ]);
        
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if ($stmt->rowCount() == 1) {
                $_SESSION["userID"] = $row["FelhID"];
                return json_encode(true);
            }
        
            return json_encode(false);
        }
    }

?>