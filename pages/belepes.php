<h2>Belépés</h2>

<?php
// Ha az űrlapot elküldték (POST kérés érkezett) 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Itt történne a valóságban az adatbázisba mentés és ellenőrzés
    $email = htmlspecialchars($_POST['email']);

    // Visszajelzés a felhasználónak
    echo "<div class='success-message'>";
    echo "<p>Sikeres bejelentkezés!</p>";
    echo "<p>Üdvözöljük, kedves felhasználó!</p>";
    echo "</div>";
} else {
    // Ha még nem küldték el, mutassuk az űrlapot
?>

    <form action="index.php?page=belepes" method="post" class="user-form">
        <div class="form-group">
            <label for="email">E-mail cím:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="jelszo">Jelszó:</label>
            <input type="password" id="jelszo" name="jelszo" required>
        </div>
        <button type="submit" class="btn">Bejelentkezem</button>
    </form>

<?php } ?>
