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
                    <div class="mdl-card__title-text">
                        <h3>Beállítások</h3>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <p>Egy adat átírásához csak kattintson a szövegmezőre és írja bele az új értéket, Majd kattitnson az elfogadás gombra!</p>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input type="text" name="UjMail" id="UjMail" class="mdl-textfiled__input">
                            <label for="UjMail" id="UjMailLABEL" class="mdl-textfiled__label">Valami</label>
                        </div>
                        <button type="button" id="MailFrissitGomb" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Megerősítés</button>
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