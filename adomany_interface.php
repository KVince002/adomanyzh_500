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
    if (!isset($_SESSION["userID"])) { //ha nincsen belépve ha nincs semmi a sessionbe
        header('adomany_login.php'); //vissza dobja
    }
    require_once "common/public_nav.php";
    ?>
    <main class="mdl-layout__content">
        <div class="page-content">

        </div>
    </main>
    <?php
    require_once "common/public_footer.php";
    ?>
    <script src="<?= BASEURL ?>/assets/js/adomanyinterfacescript.js"></script>
</body>

</html>
