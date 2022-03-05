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
            <h1 id="koszonto">Köszöntünk újra itt!</h1>
            <h2 id="nev"></h2>
            <div class="mdl-grid">
                <!-- adományszervezet profiljának szerkeztése -->
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
                        <input type="checkbox" name="Igen" id="Igen" class="mdl-checkbox__input" onclick="if(this.checked){BiztosTorles()}">
                        <br>
                        <button type="button" name="Torol" id="Torol" disabled="true" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><b>Törlés</b></button>
                    </div>
                </div>
                <!-- adományszervezet jelenlegi gyüjtései -->
                <div class="mdl-card mdl-cell mdl-cell--4-col">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Jelnelegi gyűjtések</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <!-- lista -->
                        <ul class="mdl-list" id="TargyMegjl">

                        </ul>
                    </div>
                </div>
                <!-- tárgy létrehozása -->
                <div class="mdl-card mdl-cell mdl-cell--6-col">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Új gyűjtés létrehozása</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <!-- targy neve -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <label class="mdl-textfield__label" for="TargyNev" id="UjCimLabel">Gyűjtés neve</label>
                            <input class="mdl-textfield__input" type="text" name="TargyNev" id="TargyNev" required maxlength="249">
                            <br>
                        </div>
                        <!-- tárgy leírása -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <label class="mdl-textfield__label" for="TargyLe" id="UjLeLabel">Gyűjtés leírása</label>
                            <textarea class="mdl-textfield__input" type="text" name="TargyLe" id="TargyLe" required maxlength="249" rows="3"></textarea>
                            <br>
                        </div>
                        <!-- cél kitűzése -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="TargyCel" name="TargyCel">
                            <label class="mdl-textfield__label" for="TargyCel">Cél</label>
                            <span class="mdl-textfield__error">Ez nem szám!</span>
                        </div>
                        <!-- Minimum összeg -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="TargyMin" name="TargyMin">
                            <label class="mdl-textfield__label" for="TargyCel">Minimum összeg</label>
                            <span class="mdl-textfield__error">Ez nem szám!</span>
                        </div>
                    </div>
                    <div class="mdl-card__actions">
                        <button type="button" id="TargyLetrehoz" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"">Létrehozás</button>
                    </div>
                </div>
                <!-- targy statisztika -->
                <div class=" mdl-card mdl-cell mdl-cell--6-col">
                            <div class="mdl-card__title">
                                <h2 class="mdl-card__title-text">Statisztikák</h2>
                            </div>
                            <div class="mdl-card__supporting-text" id="eredmeny">
                                <table id="eredmenyTabla">
                                    <thead>
                                        <th>Cím</th>
                                        <th>Minimum összeg</th>
                                        <th>Cél</th>
                                        <th>Jelenleg</th>
                                    </thead>
                                    <tbody id="tablaTest">

                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
    </main>
    <?php
    require_once "common/public_footer.php";
    ?>
    <script src=" <?= BASEURL ?>/assets/js/adomanyinterfacescript.js"></script>
</body>

</html>
