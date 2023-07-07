<input type="checkbox" id="nav-toggle">
<div class="sidebar" id="mySidebar">
    <div class="sidebar-brand">
        <img src="/public/assets/img/logo_blanc_200px.png" alt="logo Maternity Book">
        <h2>Maternity Book</h2>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li <?php if ($page_actuelle == "/views/index.view.php") {
                echo ' class="active"';
            } ?>>
                <a href="/views/user/index.view.php">
                    <span><i class="fa-solid fa-house icon_tb_user"></i></span>
                    <span>Tableau de Bord</span>
                </a>
            </li>
            <li <?php if ($page_actuelle == "/views/user/semainier.php") {
                echo ' class="active"';
            } ?>>
                <a href="/views/user/semainier.php">
                    <span><i class="fa-solid fa-table-cells-large icon_tb_user"></i></span>
                    <span>Semainier</span>
                </a>
            </li>
            <li <?php if ($page_actuelle == "/views/user/mon_livre.php") {
                echo ' class="active"';
            } ?>>
                <a href="/views/user/mon_livre.php">
                    <span><i class="fa-solid fa-book icon_tb_user"></i></span>
                    <span>Mon livre</span>
                </a>
            </li>
            <li <?php if ($page_actuelle == "/views/user/calendrier.php") {
                echo ' class="active"';
            } ?>>
                <a href="/views/user/calendrier.php">
                    <span><i class="fa-regular fa-calendar icon_tb_user"></i></span>
                    <span>Calendrier</span>
                </a>
            </li>
            <li <?php if ($page_actuelle == "/views/user/profil.php") {
                echo ' class="active"';
            } ?>>
                <a href="/views/user/profil.php">
                    <span><i class="fa-regular fa-user"></i></span>
                    <span>Profil</span>
                </a>
            </li>
            <li <?php if ($page_actuelle == "/views/user/arbre.php") {
                echo ' class="active"';
            } ?>>
                <a href="/views/user/arbre.php">
                    <span><i class="fa-solid fa-tree icon_tb_user"></i></span>
                    <span>Arbre Généalogique</span>
                </a>
            </li>
            <li <?php if ($page_actuelle == "/views/user/parametres.php") {
                echo ' class="active"';
            } ?>>
                <a href="/views/user/parametres.php">
                    <span><i class="fa-solid fa-sliders icon_tb_user"></i></span>
                    <span>Paramètres Compte</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-footer">
        <div class="sidebar-profil">
            <img src="/public/assets/img/img_profil.jpg" alt="image profil">
            <span><?= $user->prenom ?></span>
        </div>
        <div class="deconnexion">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <a href="/log/logout.php">Se déconnecter</a>
        </div>
    </div>
</div>