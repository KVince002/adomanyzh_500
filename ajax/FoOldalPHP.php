<?php
    require_once "../app/functions.php";
    if (isset($_POST["funkcio"])) {
        if ($_POST["funkcio"]=="Betoltes") {
            Betoltes($conn);
        }
    }