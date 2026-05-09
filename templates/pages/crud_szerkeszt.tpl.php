<section class="crud-header">
    <h2>Tanösvény módosítása</h2>
    <p>Itt módosíthatod a kiválasztott tanösvény adatait.</p>
</section>

<?php if (!empty($hibak)) { ?>
    <div class="error-message">
        <?php foreach ($hibak as $hiba) { ?>
            <p><?= htmlspecialchars($hiba) ?></p>
        <?php } ?>
    </div>

    <a href="crud" class="back-button">Vissza a listához</a>
<?php } ?>

<?php if ($ut) { ?>
    <section class="crud-form-box">
        <form action="crud_mentes" method="post" class="crud-form">
            <input type="hidden" name="muvelet" value="modositas">
            <input type="hidden" name="azon" value="<?= htmlspecialchars($ut['azon']) ?>">

            <div class="form-row">
                <label for="nev">Tanösvény neve:</label>
                <input type="text" id="nev" name="nev" value="<?= htmlspecialchars($ut['nev']) ?>">
            </div>

            <div class="form-row">
                <label for="hossz">Hossz:</label>
                <input type="text" id="hossz" name="hossz" value="<?= htmlspecialchars($ut['hossz']) ?>">
            </div>

            <div class="form-row">
                <label for="allomas">Állomások száma:</label>
                <input type="number" id="allomas" name="allomas" value="<?= htmlspecialchars($ut['allomas']) ?>">
            </div>

            <div class="form-row">
                <label for="ido">Idő:</label>
                <input type="text" id="ido" name="ido" value="<?= htmlspecialchars($ut['ido']) ?>">
            </div>

            <div class="form-row">
                <label for="vezetes">Vezetés:</label>
                <select id="vezetes" name="vezetes">
                    <option value="0" <?= ((int)$ut['vezetes'] === 0) ? 'selected' : '' ?>>Nem</option>
                    <option value="-1" <?= ((int)$ut['vezetes'] === -1) ? 'selected' : '' ?>>Igen</option>
                </select>
            </div>

            <div class="form-row">
                <label for="telepulesid">Település:</label>
                <select id="telepulesid" name="telepulesid">
                    <option value="">-- Válassz települést --</option>
                    <?php foreach ($telepulesek as $telepules) { ?>
                        <option value="<?= htmlspecialchars($telepules['id']) ?>"
                            <?= ((int)$ut['telepulesid'] === (int)$telepules['id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($telepules['telepules_nev'] . ' - ' . $telepules['np_nev']) ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-buttons">
                <button type="submit" class="save-button">Módosítás mentése</button>
                <a href="crud" class="back-button">Vissza</a>
            </div>
        </form>
    </section>
<?php } ?>