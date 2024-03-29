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
        require_once  "common/public_nav.php";
    ?>
    <main class="mdl-layout__content">
        <div class="page-content">

            <div id="Kartya">

                <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Bejelentkezés adománygyűjtőként</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <label class="mdl-textfield__label" for="AEmail">Regisztrált E-mail cím</label>
                            <input class="mdl-textfield__input" type="email" name="AEmail" id="AEmail" autofocus required autocomplete="email">
                            <br>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <label class="mdl-textfield__label" for="AJelszo">Jelszó</label>
                            <input class="mdl-textfield__input" type="password" name="AJelszo" id="AJelszo" required>
                            <br>
                        </div>
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <button type="button" class="mdl-button mdl-js-button mdl-js-ripple-effect" id="AdomanyBejelentkez">
                            <a href="../AdomanyInterface/adomanyinterface.html">Bejelentkezés</a>
                        </button>
                    </div>
                </div>
            </div>

            <div id="Kartya">
                <!-- regisztráció -->
                <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Regisztrálás adománygyűjtőként</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <label class="mdl-textfield__label" for="Nev">Szervezet neve</label>
                            <input class="mdl-textfield__input" type="text" name="Nev" id="Nev" required maxlength="249">
                            <br>
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <label class="mdl-textfield__label" for="Leiras">Szervezet rövid leírása</label>

                            <textarea class="mdl-textfield__input" type="text" rows="2" id="Leiras" name="Leiras"></textarea>
                            <br>
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <label class="mdl-textfield__label" for="Email">Szervezet E-mail címe</label>

                            <input class="mdl-textfield__input" type="email" name="Email" id="Email" required maxlength="249">
                            <br>
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <label class="mdl-textfield__label" for="Jelszo">Jelszó</label>
                            <input class="mdl-textfield__input" type="text" name="Jelszo" id="Jelszo" required maxlength="249" autocomplete="new-password">
                            <br>
                        </div>
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <button type="button" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" id="AdomanyRegisztral">
                            Regisztráció
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </main>
    </div>

    <?php
        require_once "common/public_footer.php";
    ?>
    <script src="<?=BASEURL?>/assets/js/adomany_login.js"></script>
</body>

</html>
