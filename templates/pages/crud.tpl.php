<section class="crud-header">
    <h2>CRUD műveletek - Tanösvények</h2>
    <p>
        Itt lehet megtekinteni, létrehozni, módosítani és törölni a tanösvényeket az adatbázisból.
    </p>

    <a href="crud_uj" class="add-button">Új tanösvény hozzáadása</a>
</section>

<?php if (!empty($hibak)) { ?>
    <div class="error-message">
        <?php foreach ($hibak as $hiba) { ?>
            <p><?= htmlspecialchars($hiba) ?></p>
        <?php } ?>
    </div>
<?php } ?>

<section class="crud-box">
    <?php if (!empty($utak)) { ?>
        <div class="table-wrapper">
            <table class="crud-table">
                <thead>
                    <tr>
                        <th>Azon</th>
                        <th>Név</th>
                        <th>Hossz</th>
                        <th>Állomás</th>
                        <th>Idő</th>
                        <th>Vezetés</th>
                        <th>Település</th>
                        <th>Nemzeti park</th>
                        <th>Műveletek</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($utak as $ut) { ?>
                        <tr>
                            <td><?= htmlspecialchars($ut['azon']) ?></td>
                            <td><strong><?= htmlspecialchars($ut['nev']) ?></strong></td>
                            <td><?= htmlspecialchars($ut['hossz']) ?> km</td>
                            <td><?= htmlspecialchars($ut['allomas']) ?></td>
                            <td><?= htmlspecialchars($ut['ido']) ?> óra</td>
                            <td>
                                <?php if ((int)$ut['vezetes'] === -1) { ?>
                                    Igen
                                <?php } else { ?>
                                    Nem
                                <?php } ?>
                            </td>
                            <td><?= htmlspecialchars($ut['telepules_nev']) ?></td>
                            <td><?= htmlspecialchars($ut['np_nev']) ?></td>
                            <td class="actions">
                                <a href="crud_szerkeszt&azon=<?= urlencode($ut['azon']) ?>" class="edit-button">Módosítás</a>

                                <form action="crud_torol" method="post" class="delete-form" onsubmit="return confirm('Biztosan törlöd ezt a tanösvényt?');">
                                    <input type="hidden" name="azon" value="<?= htmlspecialchars($ut['azon']) ?>">
                                    <button type="submit" class="delete-button">Törlés</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <p>Nincs még tanösvény az adatbázisban.</p>
    <?php } ?>
</section>