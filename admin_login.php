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
    ?>
    <main class="mdl-layout__content">
        <div class="page-content">

            <div id="Kartya">
                <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Bejelentkezés Adminként</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <label class="mdl-textfield__label" for="AEmail">Admin E-mail cím</label>
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
                        <button type="button" class="mdl-button mdl-js-button mdl-js-ripple-effect" id="AdminBe">
                            <a href="AdminInterface.html">Bejelentkezés</a>
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
    <script src="<?=BASEURL?>/assets/js/admin_login.js"></script>
</body>

</html>