<?php
   
    /**
    // * hash -> A hash egy egyirányú titkosítás, tehát elvilekben 
     * nem lehet visszafejteni.
     * Azért használunk hash-t, hogyha fel is törik az adatbázist, 
     * akkor se jussanak hozzá a jelszóhoz.
     * A hash minden karakterszámú karekterláncból adott hosszúságú titkosított stringet képez.
     * Mikor jó egy hash algoritmus?
     * 
     42202d2f920d00d416d5b218692405b5403a560719748c39466fa3527e403f8b689ec52f47e54d0723b59cb8e57e8680d0f23e84c6960278d49a9af1509bdbcb
     278891cad31709da7dacdeae64721c409790bff57bf41fe4aa6424b549b6fcbde8f1eaa032eb2958e9bb4eea612da35f94f65e566216d94f9c0b28219ed461af   
     - kellően hosszú hash lenyomatot képezzen
        - két, hasonló szó hash kódja is nagyon különbözzön egymástól
            peti, pite
     */


    /**
     //* A $_SESSION egy szuperglobális tömb, egyébként pedig egy fájl és annak a tartalma.
     * Ahhoz, hogy session-t használjunk, meg kell hívni a session_start függvényt.
     * A session változók értékei a tmp mappában tárolódnak.
     */
    // session_start();

    //*beleraktuk a session tömbbe a userID-t
    // $_SESSION["userID"] = 11;

    // *a session_unset kitörli a session fájl tartalmát
    // session_unset();
    
    // *kitörli a fájlt
    // session_destroy();

    /**
     * url változók (a kérdőjel után)
        ?valami=ertek&masvalami1=ertek2
     */


   function pre() {
    
   }

   echo "<pre>";
   print_r($_SERVER);
   echo "</pre>";

   