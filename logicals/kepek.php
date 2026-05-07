<?php
$galeriaMappa = './images/gallery/';
$engedelyezettTipusok = array(
    'image/jpeg' => 'jpg',
    'image/png' => 'png',
    'image/gif' => 'gif',
    'image/webp' => 'webp'
);

$uzenet = '';
$hibak = array();

if (!is_dir($galeriaMappa)) {
    mkdir($galeriaMappa, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['kep'])) {

    if (!isset($_SESSION['login'])) {
        $hibak[] = 'Képet csak bejelentkezett felhasználó tölthet fel.';
    } else {
        $kep = $_FILES['kep'];

        if ($kep['error'] !== UPLOAD_ERR_OK) {
            $hibak[] = 'Hiba történt a fájl feltöltése közben.';
        }

        if ($kep['size'] > 5 * 1024 * 1024) {
            $hibak[] = 'A kép mérete maximum 5 MB lehet.';
        }

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeTipus = finfo_file($finfo, $kep['tmp_name']);
        finfo_close($finfo);

        if (!array_key_exists($mimeTipus, $engedelyezettTipusok)) {
            $hibak[] = 'Csak JPG, PNG, GIF vagy WEBP kép tölthető fel.';
        }

        if (empty($hibak)) {
            $kiterjesztes = $engedelyezettTipusok[$mimeTipus];
            $ujFajlnev = 'tanosveny_' . date('Ymd_His') . '_' . uniqid() . '.' . $kiterjesztes;
            $cel = $galeriaMappa . $ujFajlnev;

            if (move_uploaded_file($kep['tmp_name'], $cel)) {
                $uzenet = 'A kép feltöltése sikeres.';
            } else {
                $hibak[] = 'A kép mentése nem sikerült.';
            }
        }
    }
}

$kepek = array();

if (is_dir($galeriaMappa)) {
    $fajlok = scandir($galeriaMappa);

    foreach ($fajlok as $fajl) {
        if ($fajl !== '.' && $fajl !== '..') {
            $eleres = $galeriaMappa . $fajl;

            if (is_file($eleres)) {
                $mime = mime_content_type($eleres);

                if (array_key_exists($mime, $engedelyezettTipusok)) {
                    $kepek[] = $fajl;
                }
            }
        }
    }

    rsort($kepek);
}
?>