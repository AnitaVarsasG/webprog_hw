<nav class="top-navbar">
    <ul class="menu-list">
        <?php foreach ($menu_elemek as $azonosito => $adatok): ?>
            <li><a href="index.php?page=<?php echo $azonosito; ?>"><?php echo $adatok['cim']; ?></a></li>
        <?php endforeach; ?>
    </ul>
    
    <div class="user-management">
        <?php if (isset($_SESSION['bejelentkezve']) && $_SESSION['bejelentkezve'] === true): ?>
            <span>Szia, felhasználó!</span>
            <a href="index.php?page=kilepes" class="btn-small">Kilépés</a>
        <?php else: ?>
            <a href="index.php?page=belepes">Belépés</a> | 
            <a href="index.php?page=regisztracio">Regisztráció</a>
        <?php endif; ?>
    </div>
</nav>