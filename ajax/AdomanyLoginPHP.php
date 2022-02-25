<?php

    require_once "../app/functions.php";

    if(isset($_POST["funkcio"]) && $_POST["funkcio"] == "Regisztral") {
        Regisztral($_POST["Nev"], $_POST["Leiras"], $_POST["Email"], $_POST["Jelszo"], $conn);
    } else if(isset($_POST["funkcio"])) {
        beEllenoriz($_POST["AEmail"], $_POST["AJelszo"], $conn);
    }