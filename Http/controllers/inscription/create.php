<?php

use Core\Session;

// Générer et stocker le jeton CSRF dans la session
$csrfToken = Session::generateCsrfToken();

// index.php ou le fichier de routage principal
if ($_SERVER['REQUEST_URI'] === '/register') {
    // Inclure le fichier create.view.php qui contient le formulaire d'inscription
    include base_path('views/inscription/create.view.php');
    exit; // Arrêter l'exécution du script après avoir renvoyé le contenu du formulaire
}
