<?php
require_once "../app/functions.php";
if (isset($_POST["funkcio"])) {
    if ($_POST["funkcio"] == "Regisztral") {
        //*eredeti
        // echo Regisztral($_POST["Nev"], $_POST["Leiras"], $_POST["Email"], $_POST["Jelszo"], $conn);

        //*OOP
        $fk = new FelhasznaloKezelo();
        echo $fk->Regisztral(
            $_POST["Nev"],
            $_POST["Leiras"],
            $_POST["Email"],
            $_POST["Jelszo"]
        );
    } else if ($_POST["funkcio"] == "beEllenoriz") {
        //*eredeti
        // echo beEllenoriz($_POST["AEmail"], $_POST["AJelszo"], $conn);

        //*OOP
        $fk = new FelhasznaloKezelo();
        echo $fk->Bejelentkez($_POST["AEmail"], $_POST["AJelszo"]);
    }
}
