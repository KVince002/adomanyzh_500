<?php
require_once "../app/functions.php";
if (isset($_POST["funkcio"])) {
    if ($_POST["funkcio"] == "Regisztral") {
        //*eredeti
        // echo Regisztral($_POST["Nev"], $_POST["Leiras"], $_POST["Email"], $_POST["Jelszo"], $conn);

        //*OOP
        $fk = new FelhasznaloKezelo(
            $_POST["Nev"],
            $_POST["Leiras"],
            $_POST["Email"],
            $_POST["Jelszo"]
        );
        echo $fk->Regisztral($nev, $leiras, $email, $jelszo);
    } else if ($_POST["funkcio"] == "beEllenoriz") {
        //*eredeti
        // echo beEllenoriz($_POST["AEmail"], $_POST["AJelszo"], $conn);

        //*OOP
        echo $fk->Bejelentkez($_POST["AEmail"], $_POST["AJelszo"]);
    }
}
