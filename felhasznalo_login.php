<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Felhasználó regisztrálás</title>
    <link rel="stylesheet" href="../adomanyzh2REWORK/assets/styles/Navigaciossav.css">
    <!-- <link rel="stylesheet" href="Felhaszreg.css"> -->
    <link rel="stylesheet" href="../adomanyzh2REWORK/assets/styles/kartyanazet.css">
    <link rel="stylesheet" href="../adomanyzh2REWORK/assets/styles/footer.css">
    <!--material-->
    <?php
    include_once "../adomanyzh2REWORK/common/Material.php";
    include_once "../adomanyzh2REWORK/common/altafont.php";
    ?>
</head>

<!--material light head -->
<?php
include_once "../adomanyzh2REWORK/common/public_nav.php";
?>
<main class="mdl-layout__content">
    <div class="page-content">

        <div id="Kartya">
            <!-- bejelentkezés -->
            <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Bejelentkezés felhasználóként</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <label class="mdl-textfield__label" for="FEmail">Regisztrált E-mail cím</label>
                        <input class="mdl-textfield__input" type="email" name="FEmail" id="FEmail" autofocus required autocomplete="email">
                        <br>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <label class="mdl-textfield__label" for="FJelszo">Jelszó</label>
                        <input class="mdl-textfield__input" type="password" name="FJelszo" id="FJelszo" required>
                        <br>
                    </div>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect" id="FelhasznaloBejelentkez">
                        <a href="../FelhasznalóInterface/felhasznalointerface.html">Bejelentkezés</a>
                    </button>
                </div>
            </div>
        </div>

        <div id="Kartya">
            <!-- regisztráció -->
            <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Regsztrálás felhasználóként</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <label class="mdl-textfield__label" for="knev">Keresztnév</label>
                        <input class="mdl-textfield__input" type="text" name="knev" id="knev" required maxlength="249">
                        <br>
                    </div>
                </div>
                <div class="mdl-card__supporting-text">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <label class="mdl-textfield__label" for="vnev">Vezetéknév</label>
                        <input class="mdl-textfield__input" type="text" name="vnev" id="vnev" required maxlength="249">
                        <br>
                    </div>
                </div>
                <div class="mdl-card__supporting-text">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <label class="mdl-textfield__label" for="bnev">Becenév</label>
                        <input class="mdl-textfield__input" type="text" name="bnev" id="bnev" required maxlength="249">
                        <br>
                    </div>
                </div>
                <div class="mdl-card__supporting-text">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <label class="mdl-textfield__label" for="knev">Telefonszám</label>
                        <input class="mdl-textfield__input" type="text" name="telsz" id="telsz" required maxlength="11" placeholder="pl.: 0612345789">
                        <br>
                    </div>
                </div>
                <div class="mdl-card__supporting-text">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <label class="mdl-textfield__label" for="email">E-mail</label>
                        <input class="mdl-textfield__input" type="text" name="email" id="email" required maxlength="249">
                        <br>
                    </div>
                </div>
                <div class="mdl-card__supporting-text">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <label class="mdl-textfield__label" for="knev">Jelszó</label>
                        <input class="mdl-textfield__input" type="text" name="jelsz" id="jelsz" required maxlength="249">
                        <br>
                    </div>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" id="FelhasznaloRegisztral">
                        Regisztráció
                    </a>
                </div>
            </div>
        </div>

    </div>
</main>
</div>

<!-- lábléc -->
<?php
include_once "../adomanyzh2REWORK/common/public_footer.php"
?>
</body>

</html>