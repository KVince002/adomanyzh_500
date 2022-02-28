<?php

/**
        include behív egy fájl egy másikba
        include_once behív egy fájl egy másikba, de ha véletlenül kétszer hivatkoznánk
        az adott fájlra, akkor is csak egyszer
        require -> ugyanazt csinálja, mint az include, az a különbség, hogyha
            az include nem találja a fájlt, akkor hibát jelez ugyan, 
            de a kód fut tovább. Az require-nél leáll a kód futása, 
            ha nem találja a fájlt.
        require_once -> ugyanabban különbözik a require-től, mind az include
        az include_once-tól
 */


include_once "init.php";

//admin regisztáció
function AdminBe($email, $jelszo, $conn)
{

    //*bejelentkezés stackoverflow-os változata
    $stmt = $conn->prepare("SELECT * 
        from adminok 
        where email = ? AND jelszo = ?");

    /**
     * Itt adod meg a paramétereket, 
     * a jelszót és az emailt.
     * Az execute vár egy tömböt, 
     * és a tömbben pedig sorrendben
     * kell lennie az sql paramétereknek.
     */
    $stmt->execute([
        $email,
        hash("sha512", $jelszo)
    ]);

    // $stmt->bind_result($email, $jelszo);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //$stmt->rowCount() -> hány sort sikerült leszedni
    if ($stmt->rowCount() == 1) {
        $_SESSION["userID"] = $row["id"];
        //ő az admin
        $_SESSION["admin"] = true;
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
}

function LoadPage()
{
    /**
     * Két url változót készítünk
            - scene -> melyik felületen vagyunk (admin, felhasználói felület, publikus felület stb..)
            - page -> a felületen belül melyik oldal
     */
    $page = $_GET["page"];
    $scene = $_GET["scene"];
}

//adomány szervezet
//*Kijavítva
function beEllenoriz($AEmail, $AJelszo, $conn)
{
    $stmt = $conn->prepare("SELECT * from adomanyszerv where email =? and jelszo=?");

    $stmt->execute([
        $AEmail,
        hash("sha512", $AJelszo)
    ]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() == 1) {
        session_start();
        $_SESSION["userID"] = $row["id"];
        // $_SESSION["felhasz"] = true;
        echo json_encode(true);
    } else {
        echo json_encode(false);
        false;
    }
}

//* működik!
function Regisztral($nev, $leiras, $email, $jelszo, $conn)
{
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
        $stmt = $conn->prepare("INSERT INTO adomanyszerv (nev, leiras, email, jelszo) VALUES(?,?,?,?)");

        $stmt->execute([
            $nev, $leiras,
            $email, hash("sha512", $jelszo)
        ]);
        echo json_encode(true);
        return true;
    } else {
        echo json_encode($errors);
        echo json_encode(false);
    }


    return $errors;
}
//felhasználó bejelentkez
function Bejelentkez($email, $jelsz, $conn)
//? lehet, hogy gond az ezonos nevű paraméterek
{
    $stmt = $conn->prepare("SELECT * from adminok where email =? and jelszo =?");

    $stmt->execute([
        $email,
        hash("sha512", $jelsz)
    ]);

    //Eredmény
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() == 1) {
        $_SESSION["userID"] = $row["id"];
        $_SESSION["felhasznalo"] = true;
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
}
//felhasználó regisztáció
function FRegisztral($vnev, $knev, $bnev, $email, $telsz, $jelsz, $conn)
{
    $errors = [];

    if (mb_strlen($vnev) < 2)
        $errors[] = "A vezetéknévnek legalább 2 karakteresnek kell lennie!";
    if (mb_strlen($knev) < 3)
        $errors[] = "A keresztnévnek legalább 3 karakteresnek kell lennie!";
    //email validáció
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors[] = "Az email cím nem megfelelő formátumú!";
    if (mb_strlen($jelsz) < 8)
        $errors[] = "A jelszónak legalább 8 karakteresnek kell lennie!";

    //*ha nincs hiba
    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO felhasz 
        (keresztnev, vezeteknev, email, jelszo, telefonszam, fabatka, becenev)
        VALUES(?,?,?,?,?,?,?)");

        $stmt->execute([
            $knev, $vnev, $email, hash("sha512", $jelsz), $telsz, 25000, $bnev
        ]);
        echo json_encode(true);
        return true;
    } else {
        echo json_encode($errors);
        echo json_encode(false);
    }


    return $errors;
}

//főoldal
//betöltés
class kartya
{
    private $fejlec;
    private $leiras;
    private $kep; //ugyebár ez az elérési útvonal

    function __construct($fejlec, $leiras, $kep)
    {
        $this->fejlec = $fejlec;
        $this->leiras = $leiras;
        $this->kep = $kep;
    }
    function get_fejlec($ertek)
    {
        $this->fejlec = $ertek;
    }
    function get_leiras($ertek)
    {
        $this->leiras = $ertek;
    }
    function get_kep($ertek)
    {
        $this->kep = $ertek;
    }
}
function Betoltes($conn)
{
    $stmt = $conn->prepare("SELECT * from adomanytargy");
    $stmt->execute();
    $eredmeny = $stmt->fetch(PDO::FETCH_ASSOC);
    //echo json_encode($eredmeny["cim"]);

    //todo többör is műküdjön a tömbe írás
    //$eredmeny szűrés
    //$kartyaClass = new kartya($eredmeny["cim"], $eredmeny["leiras"], $eredmeny["borito"]);

    echo json_encode($eredmeny);
}

//Adomány interface
//adatok betöltése
function AdoIntBe($conn, $userId)
{
    session_start();
    $stmt = $conn->prepare("SELECT nev, leiras, email FROM adomanyszerv WHERE id =?");
    $stmt->execute([
        $userId
    ]);

    $eredmeny = $stmt->fetch(PDO::FETCH_ASSOC);
    // if ($stmt->rowCount() > 0) {
    //     echo json_encode("Sikeres lekérdezés?");
    // } else {
    //     echo json_encode($eredmeny);
    // }
    echo $userId;
    //echo json_encode($eredmeny);
    //echo json_encode($_SESSION["userId"]);
}
