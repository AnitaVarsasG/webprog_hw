<h2>Kapcsolat</h2>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$nev = htmlspecialchars(trim($_POST['nev'] ?? ''));
	$email = htmlspecialchars(trim($_POST['email'] ?? ''));
	$telefon = htmlspecialchars(trim($_POST['telefon'] ?? ''));
	$uzenet = htmlspecialchars(trim($_POST['uzenet'] ?? ''));

	echo "<div class='success-message'>";
	echo "<p>Köszönjük, <strong>$nev</strong>! Az üzenetedet megkaptuk.</p>";
	echo "<p>Hamarosan válaszolunk erre az e-mail címre: <strong>$email</strong>.</p>";
	echo "</div>";

	echo "<h3>Beküldött adatok</h3>";
	echo "<p><strong>Név:</strong> $nev</p>";
	echo "<p><strong>E-mail:</strong> $email</p>";
	echo "<p><strong>Telefonszám:</strong> " . ($telefon !== '' ? $telefon : 'Nincs megadva') . "</p>";
	echo "<p><strong>Üzenet:</strong><br>" . nl2br($uzenet) . "</p>";
} else {
?>

	<p>Ha kérdésed van, írj nekünk az alábbi űrlapon keresztül!</p>

	<form action="index.php?page=kapcsolat" method="post" class="user-form">
		<div class="form-group">
			<label for="nev">Név:</label>
			<input type="text" id="nev" name="nev" required>
		</div>

		<div class="form-group">
			<label for="email">E-mail cím:</label>
			<input type="email" id="email" name="email" required>
		</div>

		<div class="form-group">
			<label for="telefon">Telefonszám:</label>
			<input type="text" id="telefon" name="telefon">
		</div>

		<div class="form-group">
			<label for="uzenet">Üzenet:</label>
			<textarea id="uzenet" name="uzenet" rows="5" required></textarea>
		</div>

		<button type="submit" class="btn">Üzenet küldése</button>
	</form>

<?php } ?>
 