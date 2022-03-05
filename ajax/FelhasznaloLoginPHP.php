<?php
require_once "../app/functions.php";
//gyors javítás
if (isset($_POST["funkcio"])) {
    if ($_POST["funkcio"] == "Bejelentkez") {
        echo Bejelentkez($_POST["FEmail"], $_POST["FJelszo"], $conn);
    } elseif ($_POST["funkcio"] == "FRegisztral") {
        echo  FRegisztral($_POST["vnev"], $_POST["knev"], $_POST["bnev"], $_POST["email"], $_POST["telsz"], $_POST["jelsz"], $conn);
    }
}
