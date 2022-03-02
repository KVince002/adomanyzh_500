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
    <main class="mdl-layout__content">
        <div class="page-content">
            <div class="mdl-grid">
                <div class="mdl-card mdl-cell mdl-cell--8-col">

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
