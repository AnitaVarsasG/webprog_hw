<section class="gallery-header">
    <h2>Tanösvény képgaléria</h2>
    <p>
        A galériában a magyarországi tanösvényekhez, nemzeti parkokhoz és természeti értékekhez
        kapcsolódó képek tekinthetők meg.
    </p>
</section>

<?php if (!empty($uzenet)) { ?>
    <div class="success-message">
        <?= htmlspecialchars($uzenet) ?>
    </div>
<?php } ?>

<?php if (!empty($hibak)) { ?>
    <div class="error-message">
        <?php foreach ($hibak as $hiba) { ?>
            <p><?= htmlspecialchars($hiba) ?></p>
        <?php } ?>
    </div>
<?php } ?>

<section class="upload-box">
    <h3>Új kép feltöltése</h3>

    <?php if (isset($_SESSION['login'])) { ?>
        <form action="kepek" method="post" enctype="multipart/form-data">
            <label for="kep">Válassz ki egy képet:</label>
            <input type="file" name="kep" id="kep" accept=".jpg,.jpeg,.png,.gif,.webp">
            <button type="submit">Feltöltés</button>
        </form>
    <?php } else { ?>
        <p class="login-info">
            Képfeltöltéshez először be kell jelentkezni.
            <a href="belepes">Belépés / Regisztráció</a>
        </p>
    <?php } ?>
</section>

<section class="gallery">
    <h3>Feltöltött képek</h3>

    <?php if (!empty($kepek)) { ?>
        <div class="gallery-grid">
            <?php foreach ($kepek as $kep) { ?>
                <figure class="gallery-item">
                    <a href="./images/gallery/<?= rawurlencode($kep) ?>" target="_blank">
                        <img 
                            src="./images/gallery/<?= rawurlencode($kep) ?>" 
                            alt="Tanösvény kép">
                    </a>
                    <figcaption><?= htmlspecialchars($kep) ?></figcaption>
                </figure>
            <?php } ?>
        </div>
    <?php } else { ?>
        <p>Még nincs feltöltött kép a galériában.</p>
    <?php } ?>
</section>