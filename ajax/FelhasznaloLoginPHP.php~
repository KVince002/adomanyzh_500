<?php
require_once "../app/functions.php";
//gyors javítás
if (isset($_POST["funkcio"])) {
    if ($_POST["Bejelentkez"]) {
        Bejelentkez($_POST["email"], $_POST["jelsz"], $conn);
    } elseif ($_POST["FRegisztral"]) {
        FRegisztral($_POST["vnev"], $_POST["knev"], $_POST["bnev"], $_POST["email"], $_POST["telsz"], $_POST["jelsz"], $conn);
    }
}
