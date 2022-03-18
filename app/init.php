<?php session_start();

define("BASEDIR", $_SERVER["DOCUMENT_ROOT"] . "/adomanyzh_OOP");
//http vagy https
/**
 * Ha a kérdőjel előtti feltétel teljesül, akkor a kérdőjel utáni
 * ágba megyünk, különben a kettőspont utáni ágba.
 * (Csak akkor létezik a HTTPS kulcs, hogyha be van kapcsolva 
 * a ssl titkosítás.)
 * HTTP_HOST: vagy localhost, vagy mondjuk google.com, vagy a szerver ip címe
 */
define("PROTOCOL", isset($_SERVER["HTTPS"]) ? "https://" : "http://");
define("BASEURL", PROTOCOL . $_SERVER["HTTP_HOST"] . "/adomany_OOP"); //megváltoztattam
