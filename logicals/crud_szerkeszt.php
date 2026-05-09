<?php
$hibak = array();
$ut = null;
$telepulesek = array();

if (!isset($_GET['azon']) || !is_numeric($_GET['azon'])) {
    $hibak[] = "Hiányzó vagy hibás azonosító.";
} else {
    try {
        $dbh = getDb();

        $sql = "SELECT azon, nev, hossz, allomas, ido, vezetes, telepulesid
                FROM ut
                WHERE azon = :azon";

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':azon' => $_GET['azon']));
        $ut = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$ut) {
            $hibak[] = "A tanösvény nem található.";
        }

        $sqlTelepules = "SELECT 
                            telepules.id,
                            telepules.nev AS telepules_nev,
                            np.nev AS np_nev
                         FROM telepules
                         LEFT JOIN np ON telepules.npid = np.id
                         ORDER BY telepules.nev";

        $stmtTelepules = $dbh->prepare($sqlTelepules);
        $stmtTelepules->execute();

        $telepulesek = $stmtTelepules->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        $hibak[] = "Adatbázis hiba: " . $e->getMessage();
    }
}
?>