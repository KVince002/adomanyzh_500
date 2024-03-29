<?php
require_once "../app/functions.php";

if (isset($_POST["funkcio"])) {
    //adomány szervezet adatai
    if ($_POST["funkcio"] == "AdoIntBe") {
        echo AdoIntBe($conn);
    }
    //adomány szrvzet adat frissítők
    if ($_POST["funkcio"] == "UjMail") {
        echo UjMail($_POST["FrissMail"], $conn);
    }
    if ($_POST["funkcio"] == "UjCim") {
        echo UjCim($_POST["FrissCim"], $conn);
    }
    if ($_POST["funkcio"] == "UjLeiras") {
        echo UjLe($_POST["FrissLe"], $conn);
    }
    if ($_POST["funkcio"] == "UjJelszo") {
        echo UjJelszo($_POST["FrissJelszo"], $conn);
    }
    //adományszervezet törlése
    if ($_POST["funkcio"] == "AFioktorles") {
        echo AFiokTorles($sonn);
    }
    //adományszervezet gyűjtései
    if ($_POST["funkcio"] == "AdoTargyBe") {
        echo AdoTargyBe($conn);
    }
    //adományszervezet új tárgy
    if ($_POST["funkcio"] == "TargyLetrehoz") {
        echo TargyLetrehoz($_POST["TargyNev"], $_POST["TargyLe"], $_POST["TargyCel"], $_POST["TargyMin"], $conn);
    }
    //adomány szervezet tárgy törlés
    if ($_POST["funkcio"] == "TargyTorol") {
        echo TargyTorol(json_decode($_POST["ids"]), $conn);
    }
}
