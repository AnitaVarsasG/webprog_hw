<header class="site-header">
    <h1>Mini honlap</h1>
    <?php if (isset($_SESSION['bejelentkezve']) && $_SESSION['bejelentkezve'] === true): ?>
        <p>Bejelentkezett: <?php echo htmlspecialchars($_SESSION['vezeteknev'] . ' ' . $_SESSION['utonev'] . ' (' . $_SESSION['login_nev'] . ')'); ?></p>
    <?php endif; ?>
</header>