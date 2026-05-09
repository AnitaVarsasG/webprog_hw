<section class="crud-result">
    <?php if ($sikeres) { ?>
        <h2>Sikeres művelet</h2>
        <p><?= htmlspecialchars($uzenet) ?></p>
        <a href="crud" class="back-button">Vissza a CRUD listához</a>
    <?php } else { ?>
        <h2>A mentés nem sikerült</h2>

        <div class="error-message">
            <?php foreach ($hibak as $hiba) { ?>
                <p><?= htmlspecialchars($hiba) ?></p>
            <?php } ?>
        </div>

        <a href="crud" class="back-button">Vissza a CRUD listához</a>
    <?php } ?>
</section>