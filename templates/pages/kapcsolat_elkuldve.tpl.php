<section class="contact-result">
    <?php if ($sikeres) { ?>
        <h2>Az üzenet elküldése sikeres</h2>

        <p>Az alábbi adatokat rögzítettük az adatbázisban:</p>

        <div class="message-card">
            <p><strong>Név:</strong> <?= htmlspecialchars($nev) ?></p>
            <p><strong>E-mail:</strong> <?= htmlspecialchars($email) ?></p>
            <p><strong>Tárgy:</strong> <?= htmlspecialchars($targy) ?></p>
            <p><strong>Üzenet:</strong></p>
            <p class="message-text"><?= nl2br(htmlspecialchars($uzenet)) ?></p>
            <p><strong>Beküldő:</strong> <?= htmlspecialchars($bekuldoNev) ?></p>
            <p><strong>Küldés ideje:</strong> <?= htmlspecialchars($kuldesIdeje) ?></p>
        </div>

        <a href="kapcsolat" class="back-button">Új üzenet küldése</a>
    <?php } else { ?>
        <h2>Az üzenet elküldése nem sikerült</h2>

        <div class="error-message">
            <?php foreach ($hibak as $hiba) { ?>
                <p><?= htmlspecialchars($hiba) ?></p>
            <?php } ?>
        </div>

        <a href="kapcsolat" class="back-button">Vissza az űrlaphoz</a>
    <?php } ?>
</section>