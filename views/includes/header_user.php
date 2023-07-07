<header>
    <label for="nav-toggle">
        <span><i class="fa-solid fa-bars"></i></span>
    </label>
    <a href="/views/user/index.view.php">Mon Tableau de Bord</a>
    <div class="header-links">
        <a href="/views/forum.view.php">Forum</a>
        <a href="/views/blog.view.php">Blog</a>
    </div>
    <div class="user-wrapper">
        <img src="/public/assets/img/img_profil.jpg" alt="image profil">
        <h4><?= $user->prenom ?></h4>
    </div>
</header>