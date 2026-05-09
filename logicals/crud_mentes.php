<?php
$hibak = array();
$sikeres = false;
$uzenet = '';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: crud");
    exit;
}

$muvelet = isset($_POST['muvelet']) ? $_POST['muvelet'] : '';
$azon = isset($_POST['azon']) ? $_POST['azon'] : '';

$nev = isset($_POST['nev']) ? trim($_POST['nev']) : '';
$hossz = isset($_POST['hossz']) ? trim($_POST['hossz']) : '';
$allomas = isset($_POST['allomas']) ? trim($_POST['allomas']) : '';
$ido = isset($_POST['ido']) ? trim($_POST['ido']) : '';
$vezetes = isset($_POST['vezetes']) ? trim($_POST['vezetes']) : '';
$telepulesid = isset($_POST['telepulesid']) ? trim($_POST['telepulesid']) : '';

if ($nev === '') {
    $hibak[] = "A tanösvény neve kötelező.";
}

if ($hossz === '') {
    $hibak[] = "A hossz megadása kötelező.";
}

if ($allomas === '' || !is_numeric($allomas) || (int)$allomas < 0) {
    $hibak[] = "Az állomások száma nem megfelelő.";
}

if ($ido === '') {
    $hibak[] = "Az idő megadása kötelező.";
}

if ($vezetes !== '0' && $vezetes !== '-1') {
    $hibak[] = "A vezetés értéke nem megfelelő.";
}

if ($telepulesid === '' || !is_numeric($telepulesid)) {
    $hibak[] = "Települést kötelező választani.";
}

if ($muvelet === 'modositas' && ($azon === '' || !is_numeric($azon))) {
    $hibak[] = "Hiányzó vagy hibás azonosító.";
}

if (empty($hibak)) {
    try {
        $dbh = getDb();

        if ($muvelet === 'uj') {
            $sql = "INSERT INTO ut
                    (nev, hossz, allomas, ido, vezetes, telepulesid)
                    VALUES
                    (:nev, :hossz, :allomas, :ido, :vezetes, :telepulesid)";

            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ':nev' => $nev,
                ':hossz' => $hossz,
                ':allomas' => (int)$allomas,
                ':ido' => $ido,
                ':vezetes' => (int)$vezetes,
                ':telepulesid' => (int)$telepulesid
            ));

            $sikeres = true;
            $uzenet = "Az új tanösvény sikeresen hozzá lett adva.";
        } elseif ($muvelet === 'modositas') {
            $sql = "UPDATE ut SET
                        nev = :nev,
                        hossz = :hossz,
                        allomas = :allomas,
                        ido = :ido,
                        vezetes = :vezetes,
                        telepulesid = :telepulesid
                    WHERE azon = :azon";

            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ':nev' => $nev,
                ':hossz' => $hossz,
                ':allomas' => (int)$allomas,
                ':ido' => $ido,
                ':vezetes' => (int)$vezetes,
                ':telepulesid' => (int)$telepulesid,
                ':azon' => (int)$azon
            ));

            $sikeres = true;
            $uzenet = "A tanösvény adatai sikeresen módosítva lettek.";
        } else {
            $hibak[] = "Ismeretlen művelet.";
        }

    } catch (PDOException $e) {
        $hibak[] = "Adatbázis hiba: " . $e->getMessage();
    }
}
?>