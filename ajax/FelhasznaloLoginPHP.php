<?php
require_once "../app/osztalyok.php";

//gyors javítás
if (isset($_POST["funkcio"])) {
    if ($_POST["funkcio"] == "Bejelentkez") {
        $fk = new FelhasznaloKezelo();

        echo $fk->Bejelentkez(
            $_POST["email"],
            $_POST["jelszo"]
        );
    } elseif ($_POST["funkcio"] == "FRegisztral") {
        $fk = new FelhasznaloKezelo(
            $_POST["knev"],
            $_POST["vnev"],
            $_POST["bnev"],
            $_POST["email"],
            $_POST["telsz"],
            $_POST["jelsz"]
        );

        echo $fk->FRegisztral();
    }
}
