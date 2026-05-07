<?php

// Adatbázis kapcsolat adatai
define('DB_HOST', 'localhost');
define('DB_NAME', 'm3bhzpliunjt');
define('DB_USER', 'm3bhzpliunjt');
define('DB_PASS', 'm3bhzpliunjt');

function getDb() {
    static $dbh = null;

    if ($dbh === null) {
        $dbh = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
            DB_USER,
            DB_PASS,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );

        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
    }

    return $dbh;
}



$ablakcim = array(
    'cim' => 'Magyarországi tanösvények',
);

$fejlec = array(
    'kepforras' => 'logo.png',
    'kepalt' => 'logo',
    'cim' => 'Magyarországi tanösvények',
    'motto' => 'Nemzeti parkok, túraútvonalak és természeti értékek'
);

$lablec = array(
    'copyright' => 'Copyright '.date("Y").'.',
    'ceg' => 'Tanösvények Magyarországon'
);

$oldalak = array(
	'/' => array('fajl' => 'cimlap', 'szoveg' => 'Címlap', 'menun' => array(1,1)),
    'kepek' => array('fajl' => 'kepek', 'szoveg' => 'Képek', 'menun' => array(1,1)),
	'bemutatkozas' => array('fajl' => 'bemutatkozas', 'szoveg' => 'Bemutatkozás', 'menun' => array(1,1)),
	'kapcsolat' => array('fajl' => 'kapcsolat', 'szoveg' => 'Kapcsolat', 'menun' => array(1,1)),
    'kapcsolat_elkuldve' => array('fajl' => 'kapcsolat_elkuldve', 'szoveg' => '', 'menun' => array(0,0)),
	'cikkek' => array('fajl' => 'cikkek', 'szoveg' => 'Cikkek', 'menun' => array(1,1)),
    'tablazat' => array('fajl' => 'tablazat', 'szoveg' => 'Táblázat', 'menun' => array(1,1)),
    'belepes' => array('fajl' => 'belepes', 'szoveg' => 'Belépés', 'menun' => array(1,0)),
    'kilepes' => array('fajl' => 'kilepes', 'szoveg' => 'Kilépés', 'menun' => array(0,1)),
    'belep' => array('fajl' => 'belep', 'szoveg' => '', 'menun' => array(0,0)),
    'regisztral' => array('fajl' => 'regisztral', 'szoveg' => '', 'menun' => array(0,0))
);

$hiba_oldal = array ('fajl' => '404', 'szoveg' => 'A keresett oldal nem található!');
?>