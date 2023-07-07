<?php

use Models\UserModel;

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/public/assets/css/layout/tb_user_layout.css">
    <link rel="stylesheet" href="<?php if (isset($css)) {
        echo $css;
    } ?>">
    <title>Maternity Book</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/16f50d8c2f.js" crossorigin="anonymous" defer></script>
</head>

<body>
<?php

require_once base_path('Models/UserModel.php');
require_once base_path('Models/date.model.php');

//Récupération infos User

$page_actuelle = $_SERVER['PHP_SELF'];
$userFunctions = new UserModel($pdo);
$user = $userFunctions->getUser();
$bebes = $userFunctions->getBabies($user);
$enfants = $userFunctions->getChildrens($user);
$prochainsRdvs = $userFunctions->getprochainsRdvs($user);
$pourcentageSemainier = $userFunctions->pourcentageSemainier($user);
$rdvs = $userFunctions->getRdv($user);

include base_path('views/includes/sidebar_user.php');
include base_path('views/includes/header_user.php');



// Pour que l'user remplisse le questionnaire de 1ère connexion.
if (empty($user->id_grossesse)) {
    header('location: ../forms/creation_compte.php');
};


ob_start();
include base_path('views/includes/footer.php');
?>
</body>
<script src="/assets/js/user.js"></script>

</html>
<?php
$footer = ob_get_clean();
