<?php
include "helper.php";

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'content';
}

$pageFile = 'pages/' . $page . '.php';
?>

<!DOCTYPE html>
<html>
<?php include("layouts/head.php"); ?>

<body>
    <main style="text-align: center;">
        <h1>Peta Pemetaan Instansi Pendidikan<br />Provinsi DKI Jakarta</h1>
    </main>
    <div class="content">
        <?php include("layouts/sidenav.php"); ?>
        <div class="main">
            <?php include($pageFile); ?>
        </div>

        <?php
        if (isset($scriptFile)) {
            include 'scripts/' . $scriptFile . '.php';
        }
        ?>
        <?php include("layouts/legend.php"); ?>
    </div>
    <?php include("layouts/footer.php"); ?>
</body>

</html>