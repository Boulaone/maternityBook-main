<?php session_start();
//include admin authentification

// if ($_SESSION['role'] !== 'admin') {
//     header('location: /index.view.php');
// }
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/public/assets/css/layout/tb_admin_layout.css">
    <title>Tableau de bord administrateur</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/16f50d8c2f.js" crossorigin="anonymous"></script>  <!-- ajout des icones tb_user -->

    <!-- include css.php -->

</head>
<body>

<!-- include header & sidebar -->
<?php
include '../includes/header.admin.php';
include '../includes/sidebar_admin.php';
?>

<!-- Cartes qui récupère les infos de la base de donées
    et compile tout sur la page principale du TB admin -->

<div id="main-content" class="container allContent-section py-4">
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <i class="fa fa-users mb-2"></i>
                <h4>Total Utilisateurs</h4>
                <h5>
                    <?php
                    // Connexion BDD
                    include '../_cnx/connect.php';

                    //Récupération nb total Users
                    $queryUsers = $pdo->query("SELECT COUNT(id_user) FROM USER ");
                    $nbUsers = $queryUsers->fetchColumn();
                    echo $nbUsers;
                    ?></h5>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <i class="fa fa-solid fa-users-line mb-2"></i>
                <h4>Total Utilisateurs Abonnés</h4>
                <h5>
                    <?php
                    //Récupération nb total Users Abonnés
                    $queryGrossesses = $pdo->query("SELECT COUNT(id_grossesse) FROM GROSSESSE ");
                    $nbGrossesses = $queryGrossesses->fetchColumn();
                    echo $nbGrossesses;
                    ?>
                </h5>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <i class="fa fa-solid fa-chart-line mb-2" style="font-size: 70px;"></i>
                <h4>Statistiques</h4>
                <h5>
                    <?php

                    /* Requêtes php pour donner un aperçu des stats*/
                    ?>
                </h5>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <i class="fa fa-solid fa-book mb-2"></i>
                <h4>Total Livres Finis</h4>
                <h5>
                    <?php

                    /* Requêtes php pour récupérer le nb de livres terminés*/

                    ?>
                </h5>
            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="/public/assets/js/admin_ajax.js"></script>
<script type="text/javascript" src="/public/assets/js/tb_sidebar.js"></script>
</body>
</html>

