<?php
$hibak = array();
$uzenetek = array();

if (!isset($_SESSION['login'])) {
    header("Location: belepes");
    exit;
}

try {
    $dbh = getDb();

    $sql = "SELECT id, nev, email, targy, uzenet, bekuldo_nev, kuldes_ideje
            FROM uzenetek
            ORDER BY kuldes_ideje DESC, id DESC";

    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $uzenetek = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    $hibak[] = "Adatbázis hiba: " . $e->getMessage();
}
?>