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
    //session elnevezése
    //// $_SESSION["adomanyozo"] = $_POST[$AEmail];
    $stmt = $conn->prepare("SELECT email, jelszo from adomanyszerv where email =? and jelszo=?");

    $stmt->execute([
        $AEmail,
        hash("sha512", $AJelszo)
    ]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() == 1) {
        $_SESSION["userID"] = $row["id"];
        $_SESSION["felhasz"] = true;
        echo json_encode(true);
    } else {
        echo json_encode(false);
        false;
    }
}

//! bugos fos
function Regisztral($nev, $leiras, $email, $jelszo, $conn)
{
    //*has jelszó
    $hashjelszo = password_hash($jelszo, "sha512");

    $felt = "INSERT INTO adomanyszerv (nev, leiras, email, jelszo) VALUES (:nev, :leiras, :email, :jelszo);";

    //*értékek
    $eretkek = [":nev" => $nev, ":leiras" => $leiras, ":email" => $email, ":jelszo" => $hashjelszo];

    try {
        $stmt = $conn->prepare($felt);

        $stmt->bindParam(":nev", $nev);
        $stmt->bindParam(":leiras", $leiras);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":jelszo", $hashjelszo);

        $stmt->execute();
        echo json_encode(true);
    } catch (PDOException $hiba) {
        echo $hiba->getMessage();
        die();
    }

    // try {
    //     $stmt = $conn->prepare($felt);
    //     $stmt->execute($eretkek);
    //     echo json_encode(true);
    // } catch (PDOException $hiba) {
    //     echo "Hiba történt";
    //     echo $hiba;
    //     echo json_encode($hiba->getMessage());
    //     die();
    // }
}

//felhasználók
function Bejelentkez($email, $jelsz, $conn)
//? lehet, hogy gond az ezonos nevű paraméterek
{
    $stmt = $conn->prepare("SELECT * from adminok where email =? and jelszo ?");

    $stmt->execute([
        $email,
        hash("sha512", $jelsz)
    ]);

    //Eredmény
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() == 1) {
        $_SESSION["userID"] = $row["id"];
    }
}

function FelhaszRegisztral($vnev, $knev, $bnev, $email, $telsz, $jelsz, $conn)
{
    $errors = [];

    if (mb_strlen($vnev) < 2)
        $errors[] = "A vezetéknévnek legalább 2 karakteresnek kell lennie!";
    if (mb_strlen($knev) < 3)
        $errors[] = "A keresztnévnek legalább 3 karakteresnek kell lennie!";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors[] = "Az email cím nem megfelelő formátumú!";
    if (mb_strlen($jelsz) < 8)
        $errors[] = "A jelszónak legalább 8 karakteresnek kell lennie!";

    //ha nincs hiba
    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO felhasz 
        (keresztnev, vezeteknev, email, jelszo, telefonszam, fabatka, becenev)
        VALUES(?,?,?,?,?,?,?)");

        $stmt->execute([
            $knev, $vnev,
            $email, hash("sha512", $jelsz),
            $telsz, 25000, $bnev
        ]);

        return true;
    }

    return $errors;
}
