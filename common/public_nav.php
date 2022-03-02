<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
<header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
            <!-- Title -->
        <span class="mdl-layout-title">Adok neki!</span>
        <span class="" <!-- Add spacer, to align navigation to the right -->
            <div class="mdl-layout-spacer"></div>
                <!-- Navigation. We hide it in small screens. -->
            <nav class="mdl-navigation mdl-layout--large-screen-only"></nav>
    </div>
</header>
<div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Adok neki!</span>
    <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="<?=BASEURL?>/fooldal.php">Főoldal</a>
        <a class="mdl-navigation__link" href="<?=BASEURL?>/felhasznalo_login.php">Felhasználói profil</a>
        <a class="mdl-navigation__link" href="<?=BASEURL?>/adomany_login.php">Adománygyűjtőknek</a>
        <a class=" mdl-navigation__link" href="<?=BASEURL?>/rolunk.php">Rólunk</a>
        <a class=" mdl-navigation__link" href="<?=BASEURL?>/fooldal.php?logout=true">Kijelentkezés</a>
    </nav>
</div>