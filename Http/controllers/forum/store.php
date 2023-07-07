<?php

/**
 * Crée un nouveau post sur le forum si le titre fourni est valide.
 *
 * Ce script récupère le titre du post envoyé via POST, valide ce titre,
 * et si il est valide, un nouveau post est créé dans la base de données.
 * L'utilisateur est alors redirigé vers la page du forum.
 * Si le titre n'est pas valide, une vue d'erreur est renvoyée.
 *
 * @package Apps\Router\controllers\forum
 * @uses Core\App
 * @uses Core\Database
 * @uses Core\Validator
 */

use Core\App;
use Core\Database;
use Core\Validator;

/** @var Database $pdo Instance de la base de données. */
$pdo = App::resolve(Database::class);

$errors = [];

if (!Validator::string($_POST['titre'], 1, 500)) {
    $errors['titre'] = 'Un titre de pas plus de 500 caractères est requis';
}

if (!empty($errors)) {
    return view("forum/create.view.php", [
        '$errors' => $errors
    ]);
}

// Insère le nouveau post dans la base de données
$pdo->query('INSERT INTO POST_FORUM(titre, id_user) VALUES(:titre, :id_user)', [
    'titre' => $_POST['titre'],
    'id_user' => 1
]);

header('location: /forum');
die();
