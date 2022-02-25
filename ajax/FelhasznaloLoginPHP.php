<?php
require_once "../app/functions.php";
Bejelentkez($_POST["email"], $_POST["jelsz"], $conn);
FelhaszRegisztral($_POST["vnev"], $_POST["knev"], $_POST["bnev"], $_POST["email"], $_POST["telsz"], $_POST["jelsz"], $conn);
exit();
