<?php
$hibak = array();
$sikeres = false;

$nev = '';
$email = '';
$targy = '';
$uzenet = '';
$bekuldoNev = 'Vendég';
$kuldesIdeje = date('Y-m-d H:i:s');

function szovegHossz($ertek) {
    if (function_exists('mb_strlen')) {
        return mb_strlen($ertek, 'UTF-8');
    }

    return strlen($ertek);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: kapcsolat");
    exit;
}

$nev = isset($_POST['nev']) ? trim($_POST['nev']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$targy = isset($_POST['targy']) ? trim($_POST['targy']) : '';
$uzenet = isset($_POST['uzenet']) ? trim($_POST['uzenet']) : '';

if ($nev === '') {
    $hibak[] = 'A név megadása kötelező.';
} elseif (szovegHossz($nev) < 3) {
    $hibak[] = 'A név legalább 3 karakter hosszú legyen.';
}

if ($email === '') {
    $hibak[] = 'Az e-mail cím megadása kötelező.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $hibak[] = 'Az e-mail cím formátuma nem megfelelő.';
}

if ($targy === '') {
    $hibak[] = 'A tárgy megadása kötelező.';
} elseif (szovegHossz($targy) < 3) {
    $hibak[] = 'A tárgy legalább 3 karakter hosszú legyen.';
}

if ($uzenet === '') {
    $hibak[] = 'Az üzenet megadása kötelező.';
} elseif (szovegHossz($uzenet) < 10) {
    $hibak[] = 'Az üzenet legalább 10 karakter hosszú legyen.';
}

if (isset($_SESSION['login'])) {
    $bekuldoNev = $_SESSION['csn'] . ' ' . $_SESSION['un'] . ' (' . $_SESSION['login'] . ')';
}

if (empty($hibak)) {
    try {
        $dbh = getDb();

        $sql = "INSERT INTO uzenetek 
                (nev, email, targy, uzenet, bekuldo_nev, kuldes_ideje)
                VALUES
                (:nev, :email, :targy, :uzenet, :bekuldo_nev, :kuldes_ideje)";

        $stmt = $dbh->prepare($sql);

        $stmt->execute(array(
            ':nev' => $nev,
            ':email' => $email,
            ':targy' => $targy,
            ':uzenet' => $uzenet,
            ':bekuldo_nev' => $bekuldoNev,
            ':kuldes_ideje' => $kuldesIdeje
        ));

        $sikeres = true;
    } catch (PDOException $e) {
        $hibak[] = 'Adatbázis hiba: ' . $e->getMessage();
    }
}
?>