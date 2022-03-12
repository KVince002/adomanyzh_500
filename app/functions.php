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
        $_SESSION["admin"] = true;
        return json_encode(true);
    }

    return json_encode(false);
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
        $_SESSION["userID"] = $row["id"];
        echo json_encode(true);
    } else {
        echo json_encode(false);
        false;
    }
}

//* működik!
//adomány szerv regosztráció
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

        //kilépünk a függvényből
        return json_encode(true);
    }

    return json_encode($errors);
}
//felhasználó bejelentkez
function Bejelentkez($email, $jelszo, $conn)
//? lehet, hogy gond az ezonos nevű paraméterek
{
    $stmt = $conn->prepare("SELECT * from felhasz where email =? and jelszo =?");
    //sablon másolaás a adomány log-ból
    $stmt->execute([
        $email,
        hash("sha512", $jelszo)
    ]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($stmt->rowCount());
    // if ($stmt->rowCount() == 1) {
    //     $_SESSION["userID"] = $row["id"];
    //     echo json_encode(true);
    // } else {
    //     echo json_encode(false);
    // }
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
        $stmt = $conn->prepare("INSERT INTO felhasz( keresztnev, vezeteknev, email, jelszo, telefonszam, fabatka, becenev) VALUES (?,?,?,?,?,?,?)");

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
//!visszavonva  
// class kartya
// {
//     private $fejlec;
//     private $leiras;
//     private $kep; //ugyebár ez az elérési útvonal

//     function __construct($fejlec, $leiras, $kep)
//     {
//         $this->fejlec = $fejlec;
//         $this->leiras = $leiras;
//         $this->kep = $kep;
//     }
//     function get_fejlec($ertek)
//     {
//         $this->fejlec = $ertek;
//     }
//     function get_leiras($ertek)
//     {
//         $this->leiras = $ertek;
//     }
//     function get_kep($ertek)
//     {
//         $this->kep = $ertek;
//     }
// }

function Betoltes($conn)
{
    $stmt = $conn->prepare("SELECT * from adomanytargy");
    $stmt->execute();
    /**
     * A fetch egyet szed le, a fetchAll meg az 
     * összeset.
     */
    $eredmeny = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //echo json_encode($eredmeny["cim"]);

    //todo többör is műküdjön a tömbe írás
    //$eredmeny szűrés
    //papíron ennek jónak kell lennie
    //$kartyaClass = new kartya($eredmeny["cim"], $eredmeny["leiras"], $eredmeny["borito"]);

    return json_encode($eredmeny);
}

//Adomány interface
//adatok betöltése
function AdoIntBe($conn)
{
    //session_start();
    $stmt = $conn->prepare("SELECT nev, leiras, email FROM adomanyszerv WHERE id =?");
    $stmt->execute([
        $_SESSION["userID"]
    ]);

    //a fetch metódusnak false a visszatérési értéke, ha nem talál adatot
    $eredmeny = $stmt->fetch(PDO::FETCH_ASSOC);
    $eredmeny = $eredmeny !== false ? $eredmeny : [];
    return json_encode($eredmeny);
}

function UjMail($frissMail, $conn)
{
    $stmt = $conn->prepare("UPDATE adomanyszerv SET email = ? WHERE id = ?");
    $stmt->execute([
        $frissMail, $_SESSION["userID"]
    ]);
    $eredmeny = $stmt->fetch(PDO::FETCH_ASSOC);
    $eredmeny = $eredmeny !== false ? $eredmeny : [];

    return json_encode($eredmeny);
}

function UjCim($frissCim, $conn)
{
    $stmt = $conn->prepare("UPDATE adomanyszerv set nev =? where id = ?");
    $stmt->execute([
        $frissCim, $_SESSION["userID"]
    ]);
    $eredmeny = $stmt->fetch(PDO::FETCH_ASSOC);
    $eredmeny = $eredmeny !== false ? $eredmeny : [];
    return json_encode($eredmeny);
}

function UjLe($frissLe, $conn)
{
    $stmt = $conn->prepare("UPDATE adomanyszerv set leiras = ? where id = ?");
    $stmt->execute([
        $frissLe, $_SESSION["userID"]
    ]);
    $eredmeny = $stmt->fetch(PDO::FETCH_ASSOC);
    $eredmeny = $eredmeny !== false ? $eredmeny : [];
    return json_encode($eredmeny);
}

function UjJelszo($frissJelszo, $conn)
{
    $stmt = $conn->prepare("UPDATE adomanyszerv set jelszo = ? where id = ?");
    $stmt->exeute([
        hash("sha512", $frissJelszo), $_SESSION["userID"]
    ]);
    $eredmeny = $stmt->fetch(PDO::FETCH_ASSOC);
    $eredmeny = $eredmeny !== false ? $eredmeny : [];
    return json_encode($eredmeny);
}

//adományszervzet törlése
function AFiokTorles($conn)
{
    $stmt = $conn->prepare("DELETE FROM adomanyszerv where id = ?");
    $stmt->execute([
        $_SESSION["userID"]
    ]);
    $eredmeny = $stmt->fetch(PDO::FETCH_ASSOC);
    $eredmeny = $eredmeny !== false ? $eredmeny : [];
    return json_encode($eredmeny);
}

//adományszervezet gyűjtései
function AdoTargyBe($conn)
{
    $stmt = $conn->prepare("SELECT * FROM adomanytargy where szervezo = ?");
    $stmt->execute([
        $_SESSION["userID"]
    ]);
    $eredmeny = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $eredmeny = $eredmeny !== false ? $eredmeny : [];
    return json_encode($eredmeny);
}
// Új tárgy létrehozás
function TargyLetrehoz($tNev, $tLeir, $tCel, $tMin, $conn)
{
    $stmt = $conn->prepare("INSERT INTO adomanytargy (cim, leiras, szervezo, cel, minosszeg, jelenleg) VALUES(?,?,?,?,?,?)");
    $stmt->execute([
        $tNev, $tLeir, $_SESSION["userID"], $tCel, $tMin, 0
    ]);

    $eredmeny = $stmt->fetch(PDO::FETCH_ASSOC);
    $eredmeny = $eredmeny !== false ? $eredmeny : [];
    return json_encode($eredmeny);
}
//tárgy törlése
function TargyTorol($tomb, $conn)
{
    for ($i = 0; $i < count($tomb); $i++) {
        $stmt = $conn->prepare("DELETE FROM adomanytargy WHERE id=?");
        $stmt->execute([
            $tomb[$i]
        ]);
        $eredmeny = $stmt->fetch(PDO::FETCH_ASSOC);
        $eredmeny = $eredmeny !== false ? $eredmeny : [];
        return json_encode($eredmeny);
    }
}

//felhasználó interface
//adatok lekérése
function adatLeker($conn)
{
    $stmt = $conn->prepare("SELECT id, keresztnev, vezeteknev, email, telefonszam, fabatka, becenev from felhasz where id =?");
    $stmt->execute([
        $_SESSION["userID"]
    ]);
    $eredmeny = $stmt->fetch(PDO::FETCH_ASSOC);
    //$eredmeny = $eredmeny !== false ? $eredmeny : [];
    return json_encode($eredmeny);
}
//uj mail
function UjMailFunc($UjMail, $conn)
{
    $stmt = $conn->prepare("UPDATE felhasz set email = ? where id =?");
    $stmt->execute([
        $UjMail, $_SESSION["userID"]
    ]);
    $eredmeny = $stmt->fetch(PDO::FETCH_ASSOC);
    $eredmeny = $eredmeny !== false ? $eredmeny : [];
    return json_encode($eredmeny);
}
//uj nev
function UjNevFunc($UjKer, $UjVez, $conn)
{
    $stmt = $conn->prepare("UPDATE felhasz set keresztnev =?, vezeteknev =? where id =?");
    $stmt->execute([
        $UjKer, $UjVez, $_SESSION["userID"]
    ]);
    $eredmeny = $stmt->fetch(PDO::FETCH_ASSOC);
    $eredmeny = $eredmeny !== false ? $eredmeny : [];
    return json_encode($eredmeny);
}
//új becenev
function UjBecFunc($UjBec, $conn)
{
    $stmt = $conn->prepare("UPDATE felhasz set becenev =? where id=?");
    $stmt->execute([
        $UjBec, $_SESSION["userID"]
    ]);
    $eredmeny = $stmt->fetch(PDO::FETCH_ASSOC);
    $eredmeny = $eredmeny !== false ? $eredmeny : [];
    return json_encode($eredmeny);
}
//új jelszo
function UjJelszoFunc($UjJelsz, $conn)
{
    $stmt = $conn->prepare("UPDATE felhasz set jelszo=? where id=?");
    $stmt->execute([
        hash("sha512", $UjJelsz), $_SESSION["userID"]
    ]);
    $eredmeny = $stmt->fetch(PDO::FETCH_ASSOC);
    $eredmeny = $eredmeny !== false ? $eredmeny : [];
    return json_encode($eredmeny);
}

//*kézi függvények

function JogosultsagEllenorzes($admin)
{
    if (!isset($_SESSION["userID"])) {
        header("location:" . BASEURL . "/fooldal.php");
    }

    if ($admin && (!isset($_SESSION["admin"]) || !$_SESSION["admin"])) {
        header("location:" . BASEURL . "/fooldal.php");
    }
}

/**
 * Akkor végezhet el egy műveletet, hogyha 
 * rendelkezik a megfelelő jogosultsággal.
 */
function MuveletJogosultsag($admin)
{
    if (!isset($_SESSION["userID"])) {
        return false;
    }

    if ($admin && (!isset($_SESSION["admin"])
        || !$_SESSION["admin"])) {
        return false;
    }

    return true;
}

function Kijelentkezes()
{
    if (isset($_GET["logout"])) {
        //kitöröljük a session-öket
        session_destroy();
    }
}
