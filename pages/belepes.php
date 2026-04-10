<h2>Belépés</h2>

<?php
// Ha az űrlapot elküldték (POST kérés érkezett) 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Itt történne a valóságban az adatbázisba mentés és ellenőrzés
    $login_nev = htmlspecialchars($_POST['login_nev']);
    $jelszo = htmlspecialchars($_POST['jelszo']);

    // Bejelentkezési adatok mentése a sessionbe (valóságban itt adatbázis-ellenőrzés történne)
    $_SESSION['bejelentkezve'] = true;
    $_SESSION['login_nev'] = $login_nev;
    $_SESSION['vezeteknev'] = 'Szarvas'; // Valóságban az adatbázisból kapnánk
    $_SESSION['utonev'] = 'János'; // Valóságban az adatbázisból kapnánk

    // Visszajelzés a felhasználónak
    echo "<div class='success-message'>";
    echo "<p>Sikeres bejelentkezés!</p>";
    echo "<p>Üdvözöljük, <strong>" . $_SESSION['login_nev'] . "</strong>!</p>";
    echo "<p><a href='index.php?page=cimlap'>Vissza a föoldal</a></p>";
    echo "</div>";
} else {
    // Ha még nem küldték el, mutassuk az űrlapot
?>

    <div style="margin-bottom: 30px;">
        <h3>Bejelentkezés</h3>
        <form action="index.php?page=belepes" method="post" class="user-form">
            <div class="form-group">
                <label for="login_nev">Login név:</label>
                <input type="text" id="login_nev" name="login_nev" required>
            </div>
            <div class="form-group">
                <label for="jelszo">Jelszó:</label>
                <input type="password" id="jelszo" name="jelszo" required>
            </div>
            <button type="submit" class="btn">Bejelentkezem</button>
        </form>
    </div>

    <div>
        <h3>Nincs még fiókod?</h3>
        <p><a href="index.php?page=regisztracio">Regisztrálj</a>on!</p>
    </div>

<?php } ?>
