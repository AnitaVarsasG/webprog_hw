<h2>Kilépés</h2>

<?php
$_SESSION['bejelentkezve'] = false;
session_destroy();

echo "<div class='success-message'>";
echo "<p>Sikeresen kiléptél!</p>";
echo "<p><a href='index.php?page=cimlap'>Vissza a föoldal</a></p>";
echo "</div>";
?>
