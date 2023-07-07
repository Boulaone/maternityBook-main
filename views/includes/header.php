<header>
    <div class="navbar">
        <div class="logo"><a>Maternity Book</a></div>
        <ul class="links">
            <li><a href="/">Accueil</a></li>
            <li><a href="/pricing">Tarifs</a></li>
            <li><a href="/forum">Forum</a></li>
            <li><a href="/blog">Blog</a></li>
            <?php
            if (isset($_SESSION['role'])) {
                if ($_SESSION['role'] === 'admin') {
                    echo '<li><a href="/views/tb_admin.php">Tableau de Bord Administrateur</a></li>';
                } else
                    // Commenté temporairement pour afficher le tb_user pour les utilisateurs gratuits

                    /* if (($_SESSION['role'] === 'abonne_p') || ($_SESSION['role'] === 'abonne_sec')) */ {
                    echo '<li><a href="/views/tb_user.php">Mon Tableau de Bord</a></li>';
                }
            }
            if (isset($_SESSION['login'])) {
                echo '<button class="action_btn" id="btn_deconnexion">Déconnexion</button>';
                echo '<form id="logout_form" method="POST" action="/session/destroy.php" style="display: none;"></form>';
            } else {
                echo '<button class="action_btn btn_connexion" id="btn_connexion">Connexion</button>';
            } ?>

            <?php require_once base_path('views/session/create.view.php'); ?>
            <?php require_once base_path('views/inscription/create.view.php'); ?>

            <div class="toggle_btn">
                <i class="fa-solid fa-bars"></i>
            </div>
    </div>

    <div class="dropdown_menu">
        <ul>
            <li><a href="/">Accueil</a></li>
            <li><a href="/pricing.php">Tarifs</a></li>
            <li><a href="/forum.php">Forum</a></li>
            <li><a href="/blog.php">Blog</a></li>
            <li><a href="#" class="action_btn btn_connexion" id="btn_connexion">Connexion</a></li>
        </ul>
    </div>
</header>
