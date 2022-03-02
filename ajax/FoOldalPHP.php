<?php
//session_start(); elméletileg nem kell (EDGE  azt mondta)
    require_once "../app/functions.php";
    if (isset($_POST["funkcio"])) {
        if ($_POST["funkcio"]=="Betoltes") {
            Betoltes($conn);
        }
    }
