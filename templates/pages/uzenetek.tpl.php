<section class="messages-header">
    <h2>Beérkezett üzenetek</h2>
    <p>
        Itt láthatók a Kapcsolat űrlapon keresztül elküldött üzenetek.
        Az üzenetek fordított időrendben jelennek meg, vagyis a legfrissebb van legfelül.
    </p>
</section>

<?php if (!empty($hibak)) { ?>
    <div class="error-message">
        <?php foreach ($hibak as $hiba) { ?>
            <p><?= htmlspecialchars($hiba) ?></p>
        <?php } ?>
    </div>
<?php } ?>

<section class="messages-box">
    <?php if (!empty($uzenetek)) { ?>
        <div class="table-wrapper">
            <table class="messages-table">
                <thead>
                    <tr>
                        <th>Küldés ideje</th>
                        <th>Beküldő</th>
                        <th>Név</th>
                        <th>E-mail</th>
                        <th>Tárgy</th>
                        <th>Üzenet</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($uzenetek as $sor) { ?>
                        <tr>
                            <td><?= htmlspecialchars($sor['kuldes_ideje']) ?></td>
                            <td><?= htmlspecialchars($sor['bekuldo_nev']) ?></td>
                            <td><?= htmlspecialchars($sor['nev']) ?></td>
                            <td><?= htmlspecialchars($sor['email']) ?></td>
                            <td><?= htmlspecialchars($sor['targy']) ?></td>
                            <td><?= nl2br(htmlspecialchars($sor['uzenet'])) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <p>Még nincs beérkezett üzenet.</p>
    <?php } ?>
</section>