<?php
session_start(); // Munkamenet (Session) elindítása a felhasználókezeléshez
require_once 'config.php';

// Megnézzük, hogy melyik oldalt kérték az URL-ben. Ha semmit, a címlap az alapértelmezett.
$aktualis_oldal = isset($_GET['page']) ? $_GET['page'] : 'cimlap';

// Biztonsági ellenőrzés: csak olyan oldalt töltünk be, ami létezik a config-ban
if (array_key_exists($aktualis_oldal, $menu_elemek)) {
    $betoltendo_fajl = 'pages/' . $menu_elemek[$aktualis_oldal]['file'];
} elseif ($aktualis_oldal == 'belepes') {
    $betoltendo_fajl = 'pages/belepes.php';
} elseif ($aktualis_oldal == 'kilepes') {
    $betoltendo_fajl = 'pages/kilepes.php';
} elseif ($aktualis_oldal == 'regisztracio') { // <--- EZT A SORT ADD HOZZÁ
    $betoltendo_fajl = 'pages/regisztracio.php'; // <--- ÉS EZT IS
} else {
    $betoltendo_fajl = 'pages/404.php';
}
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <title>Mini honlap</title>
    <link rel="stylesheet" href="stilus.css">
</head>

<body>
    <div class="container">
        <?php include 'includes/header.php'; ?>

        <div class="middle-section">
            <?php include 'includes/menu.php'; ?>

            <div class="content">
                <?php include $betoltendo_fajl; ?>
            </div>
        </div>

        <?php include 'includes/footer.php'; ?>
    </div>
</body>

</html>