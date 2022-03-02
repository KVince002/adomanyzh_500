<?php
    //*lehet hogy hiba lesz
    require_once "../app/functions.php";
    echo AdminBe($_POST["AEmail"], $_POST["AJelszo"], $conn);