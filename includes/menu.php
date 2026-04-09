<aside class="sidebar">
    <nav>
        <ul class="menu-list">
            <?php foreach ($menu_elemek as $azonosito => $adatok): ?>
                <li><a href="index.php?page=<?php echo $azonosito; ?>"><?php echo $adatok['cim']; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
    
    <div class="user-management">
        <hr>
        <?php if (isset($_SESSION['bejelentkezve']) && $_SESSION['bejelentkezve'] === true): ?>
            <p>Szia, felhasználó!</p>
            <a href="index.php?page=kilepes">Kilépés</a>
        <?php else: ?>
            <a href="index.php?page=belepes">Belépés</a>
        <?php endif; ?>
    </div>
</aside>