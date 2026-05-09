<?php
$hibak = array();
$utak = array();

try {
    $dbh = getDb();

    $sql = "SELECT 
                ut.azon,
                ut.nev,
                ut.hossz,
                ut.allomas,
                ut.ido,
                ut.vezetes,
                ut.telepulesid,
                telepules.nev AS telepules_nev,
                np.nev AS np_nev
            FROM ut
            LEFT JOIN telepules ON ut.telepulesid = telepules.id
            LEFT JOIN np ON telepules.npid = np.id
            ORDER BY ut.azon DESC";

    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $utak = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    $hibak[] = "Adatbázis hiba: " . $e->getMessage();
}
?>