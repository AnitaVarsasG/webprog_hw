<section class="crud-header">
    <h2>Új tanösvény hozzáadása</h2>
    <p>Az űrlap segítségével új tanösvényt vehetsz fel az adatbázisba.</p>
</section>

<?php if (!empty($hibak)) { ?>
    <div class="error-message">
        <?php foreach ($hibak as $hiba) { ?>
            <p><?= htmlspecialchars($hiba) ?></p>
        <?php } ?>
    </div>
<?php } ?>

<section class="crud-form-box">
    <form action="crud_mentes" method="post" class="crud-form">
        <input type="hidden" name="muvelet" value="uj">

        <div class="form-row">
            <label for="nev">Tanösvény neve:</label>
            <input type="text" id="nev" name="nev">
        </div>

        <div class="form-row">
            <label for="hossz">Hossz:</label>
            <input type="text" id="hossz" name="hossz" placeholder="pl. 7,5">
        </div>

        <div class="form-row">
            <label for="allomas">Állomások száma:</label>
            <input type="number" id="allomas" name="allomas">
        </div>

        <div class="form-row">
            <label for="ido">Idő:</label>
            <input type="text" id="ido" name="ido" placeholder="pl. 2 vagy 1,5">
        </div>

        <div class="form-row">
            <label for="vezetes">Vezetés:</label>
            <select id="vezetes" name="vezetes">
                <option value="0">Nem</option>
                <option value="-1">Igen</option>
            </select>
        </div>

        <div class="form-row">
            <label for="telepulesid">Település:</label>
            <select id="telepulesid" name="telepulesid">
                <option value="">-- Válassz települést --</option>
                <?php foreach ($telepulesek as $telepules) { ?>
                    <option value="<?= htmlspecialchars($telepules['id']) ?>">
                        <?= htmlspecialchars($telepules['telepules_nev'] . ' - ' . $telepules['np_nev']) ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="form-buttons">
            <button type="submit" class="save-button">Mentés</button>
            <a href="crud" class="back-button">Vissza</a>
        </div>
    </form>
</section>