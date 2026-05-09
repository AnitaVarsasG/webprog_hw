<?php
$hibak = array();
$telepulesek = array();

try {
    $dbh = getDb();

    $sql = "SELECT 
                telepules.id,
                telepules.nev AS telepules_nev,
                np.nev AS np_nev
            FROM telepules
            LEFT JOIN np ON telepules.npid = np.id
            ORDER BY telepules.nev";

    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $telepulesek = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    $hibak[] = "Adatbázis hiba: " . $e->getMessage();
}
?>