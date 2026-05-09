<?php
$hibak = array();
$sikeres = false;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: crud");
    exit;
}

if (!isset($_POST['azon']) || !is_numeric($_POST['azon'])) {
    $hibak[] = "Hiányzó vagy hibás azonosító.";
} else {
    try {
        $dbh = getDb();

        $sql = "DELETE FROM ut WHERE azon = :azon";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':azon' => (int)$_POST['azon']));

        if ($stmt->rowCount() > 0) {
            $sikeres = true;
        } else {
            $hibak[] = "A törlendő tanösvény nem található.";
        }

    } catch (PDOException $e) {
        $hibak[] = "Adatbázis hiba: " . $e->getMessage();
    }
}
?>