<nav class="navbar">
    <div class="nav-brand">
        <img src="<?php echo SITE_URL; ?>/public/images/logo.png" alt="IWA Logo" class="nav-logo">
    </div>
    <div class="nav-menu">
        <a href="<?php echo SITE_URL; ?>" class="nav-link <?php echo ($page === 'home') ? 'active' : ''; ?>">Accueil</a>
        <div class="nav-dropdown">
            <a href="#" class="nav-link">Formation IWA <i class="fas fa-angle-down"></i></a>
            <div class="dropdown-content">
                <a href="<?php echo SITE_URL; ?>/pages/programme.php">Programme</a>
                <a href="<?php echo SITE_URL; ?>/pages/public-vise.php">Public visé</a>
                <a href="<?php echo SITE_URL; ?>/pages/preinscription.php">Préinscription</a>
            </div>
        </div>
        <?php if (isLoggedIn()): ?>
            <?php if (isAdmin()): ?>
                <a href="<?php echo SITE_URL; ?>/admin" class="nav-link">Administration</a>
            <?php else: ?>
                <a href="<?php echo SITE_URL; ?>/student/dashboard.php" class="nav-link">Espace Étudiant</a>
            <?php endif; ?>
            <a href="<?php echo SITE_URL; ?>/logout.php" class="nav-link">Déconnexion</a>
        <?php else: ?>
            <a href="<?php echo SITE_URL; ?>/student/login.php" class="nav-link">Connexion</a>
        <?php endif; ?>
    </div>
</nav> 