<?php
require_once "../app/functions.php";
session_start();
if (isset($_POST["funkcio"])) {
    if ($_POST["funkcio"] == "AdoIntBe") {
        if (isset($_SESSION["userId"])) {
            AdoIntBe($conn, $_SESSION["userId"]);
        }
        // AdoIntBe($conn);
    }
}
