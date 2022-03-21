<?php
require_once "../app/functions.php";
if (isset($_POST["funkcio"])) {
    if ($_POST["funkcio"] == "adatLeker") {
        echo adatLeker($conn);
    }
    if ($_POST["funkcio"] == "UjMailFunc") {
        echo UjMailFunc($_POST["UjMail"], $conn);
    }
    if ($_POST["funkcio"] == "UjNevFunc") {
        echo UjNevFunc($_POST["UjKer"], $_POST["UjVez"], $conn);
    }
    if ($_POST["funkcio"] == "UjBecFunc") {
        echo UjBecFunc($_POST["UjBec"], $conn);
    }
    if ($_POST["funkcio"] == "UjJelszoFunc") {
        echo UjJelszoFunc($_POST["UjJelszo"], $conn);
    }
    if ($_POST["funkcio"] == "UjTelszFunc") {
        echo UjTelszFunc($_POST["UjTel"], $conn);
    }
}
