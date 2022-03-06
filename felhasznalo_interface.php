<?php
require_once "app/functions.php";
?>
<!DOCTYPE html>
<html lang="hu">
<?php
require_once "common/head1.php";
?>

<body>
    <?php
    require_once "common/public_nav.php";
    JogosultsagEllenorzes(false);
    ?>
    <main class="mdl-layout__content">
        <!-- köszöntő névvel -->
        <h1 id="koszonto">Üdv újra itt!</h1>
        <h2 id="nev"></h2>
        <div class="mdl-grid">
            <!-- Adomány előzmények -->
            <div class="mdl-card mdl-cell mdl-cell__6-col">
                <div class="mdl-card__title">
                    <h3 id="mdl-card__title-text">Adomány előzmények</h3>
                </div>
                <div class="mdl-card__supporting-text">
                    <p>Jelenlegi Fabatka egyenleged: </p> <span id="FabatkaMost"></span>
                    <!-- *táblázat helye* -->

                </div>
            </div>
            <!-- profil beállítások -->
            <div class="mdl-card mdl-cell mdl-cell__6-col">
                <div class="mdl-card__title">
                    <h3 id="mdl-card__title-text">Profil beállítások</h3>
                </div>
                <div class="mdl-card__supporting-text">
                    <!-- beállítások helye -->
                    <p>Adatok átírásához kattinkson a megváltoztandó adat mezújére, majd írja be az új érétket és nyomja meg a <b>Megerősítés</b> gombot a frissítéshez!</p>
                    <!-- új email -->
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <label class="mdl-textfield__label" for="UjMail" id="UjMailLabel">[jelenlegi email]</label>
                        <input class="mdl-textfield__input" type="email" name="UjMail" id="UjMail" autofocus required autocomplete="email">
                        <br>
                    </div>
                    <button type="button" id="MailFrissitGomb" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Megerősítés</button>

                    <!-- új Jelszó -->
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <label class="mdl-textfield__label" for="UjJelszo" id="UjJelszoLabel">*Új Jelszó*</label>
                        <input class="mdl-textfield__input" type="text" name="UjJelszo" id="UjJelszo" required>
                        <br>
                    </div>
                    <button type="button" id="JelszoFrissitGomb" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Megerősítés</button>

                    <!-- új becenév -->
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <label class="mdl-textfield__label" for="UjBec" id="UjBecenev">[Jelenlegi keresztnév]</label>
                        <input class="mdl-textfield__input" type="text" name="UjBec" id="UjBec" required maxlength="249">
                        <br>
                    </div>
                    <button type="button" id="CimBecenevGomb" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Megerősítés</button>

                    <!-- név változtatás -->
                    <!-- keresztnév -->
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <label class="mdl-textfield__label" for="UjKer" id="UjKeresztnev">[Jelenlegi keresztnév]</label>
                        <input class="mdl-textfield__input" type="text" name="UjKer" id="UjKer" required maxlength="249">
                        <br>
                    </div>
                    <!-- vezetéknév -->
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <label class="mdl-textfield__label" for="UjVez" id="UjVezeteknev">[Jelenlegi Vezeteknek]</label>
                        <input class="mdl-textfield__input" type="text" name="UjVez" id="UjVez" required maxlength="249">
                        <br>
                    </div>
                    <button type="button" id="NevFrissitGomb" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Megerősítés</button>

                    <!-- új telefonszám -->
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <label class="mdl-textfield__label" for="UjTel" id="UjTelefonszam">[Jelenlegi Telefonszám]</label>
                        <input class="mdl-textfield__input" type="text" name="UjTel" id="UjTel" required maxlength="249" pattern="-?[0-9]*(\.[0-9]+)?">
                        <span class="mdl-textfiled__error">Ez az érték nincs jól megadva! Csak szám engedélyezett!</span>
                        <br>
                    </div>
                    <button type="button" id="TelFrissitGomb" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Megerősítés</button>

                    <!-- fiók törlése -->
                    <p>Biztos törölni szeretné a szervezet profilját?</p>
                    <input type="checkbox" name="Igen" id="Igen" class="mdl-checkbox__input" onclick="if(this.checked){BiztosTorles()}">
                    <br>
                    <button type="button" name="Torol" id="Torol" disabled="true" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><b>Törlés</b></button>
                </div>
            </div>
        </div>
        </div>
        </div>
    </main>
    <script src="<?= BASEURL ?>/assets/js/felhasznalointerface.js"></script>
</body>
<?php
require_once "common/public_footer.php";
?>

</html>