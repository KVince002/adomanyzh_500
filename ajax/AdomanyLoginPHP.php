<?php
require_once "../app/functions.php";
if (isset($_POST["funkcio"])) {
    if ($_POST["funkcio"] == "Regisztral") {
        echo Regisztral($_POST["Nev"], $_POST["Leiras"], $_POST["Email"], $_POST["Jelszo"], $conn);
    } else if ($_POST["funkcio"] == "beEllenoriz") {
        echo beEllenoriz($_POST["AEmail"], $_POST["AJelszo"], $conn);
    }
}
