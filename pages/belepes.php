<h2>Belépés</h2>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_nev = htmlspecialchars($_POST['login_nev']);
    $jelszo = htmlspecialchars($_POST['jelszo']);

    $_SESSION['bejelentkezve'] = true;
    $_SESSION['login_nev'] = $login_nev;
    $_SESSION['vezeteknev'] = 'Szarvas'; 
    $_SESSION['utonev'] = 'János'; 

    echo "<div class='success-message'>";
    echo "<p>Sikeres bejelentkezés!</p>";
    echo "<p>Üdvözöljük, <strong>" . $_SESSION['login_nev'] . "</strong>!</p>";
    echo "<p><a href='index.php?page=cimlap'>Vissza a föoldal</a></p>";
    echo "</div>";
} else {
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
        <p><a href="index.php?page=regisztracio">Regisztrálj!</a></p>
    </div>

<?php } ?>
