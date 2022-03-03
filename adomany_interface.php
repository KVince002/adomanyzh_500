<?php
require_once "app/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
require_once "common/head1.php";
?>

<body>
    <?php
    require_once "common/public_nav.php";
    JogosultsagEllenorzes(false);
    ?>
    <!-- beállítások kártya -->
    <main class="mdl-layout__content">
        <div class="page-content">
            <div class="mdl-grid">
                <div class="mdl-card mdl-cell mdl-cell--8-col">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Beállítások</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <p>Egy adat átírásához csak kattintson a szövegmezőre és írja bele az új értéket, Majd kattitnson az <b>Megerősítés</b> gombra!</p>
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

                        <!-- név változtatás -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <label class="mdl-textfield__label" for="UjCim" id="UjCimLabel">[Jelenegi cím]</label>
                            <input class="mdl-textfield__input" type="text" name="UjCim" id="UjCim" required maxlength="249">
                            <br>
                        </div>
                        <button type="button" id="CimFrissitGomb" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Megerősítés</button>

                        <!-- leírás változtatás -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <label class="mdl-textfield__label" for="UjLe" id="UjLeLabel">Leírás</label>
                            <textarea class="mdl-textfield__input" type="text" name="UjLe" id="UjLe" required maxlength="249" rows="3"></textarea>
                            <br>
                        </div>
                        <button type="button" id="LeFrissitGomb" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Megerősítés</button>

                        <!-- fiók törlése -->
                        <p>Biztos törölni szeretné a szervezet profilját?</p>
                        <input type="checkbox" name="Igen" id="Igen" class="mdl-checkbox__input">
                        <br>
                        <button type="button" name="Torol" id="Torol" disabled="true" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><b>Törlés</b></button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    require_once "common/public_footer.php";
    ?>
    <script src="<?= BASEURL ?>/assets/js/adomanyinterfacescript.js"></script>
</body>

</html>