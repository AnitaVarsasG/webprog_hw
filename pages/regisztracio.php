<h2>Regisztráció</h2>

<?php
// Ha az űrlapot elküldték (POST kérés érkezett)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Itt történne a valóságban az adatbázisba mentés
    $nev = htmlspecialchars($_POST['nev']);
    $email = htmlspecialchars($_POST['email']);

    // Visszajelzés a felhasználónak
    echo "<div class='success-message'>";
    echo "<p>Sikeres regisztráció, kedves <strong>$nev</strong>!</p>";
    echo "<p>Most már <a href='index.php?page=belepes'>bejelentkezhetsz</a> a rendszerbe.</p>";
    echo "</div>";
} else {
    // Ha még nem küldték el, mutassuk az űrlapot
?>

    <form action="index.php?page=regisztracio" method="post" class="user-form">
        <div class="form-group">
            <label for="nev">Név:</label>
            <input type="text" id="nev" name="nev" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail cím:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="jelszo">Jelszó:</label>
            <input type="password" id="jelszo" name="jelszo" required>
        </div>
        <button type="submit" class="btn">Regisztrálok</button>
    </form>

<?php } ?>