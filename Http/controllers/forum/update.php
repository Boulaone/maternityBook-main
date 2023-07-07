<?php

/**
 * Met à jour un post du forum existant si l'utilisateur actuel est l'auteur du post et le titre est valide.
 *
 * Ce script récupère l'identifiant et le titre du post envoyé via POST, trouve le post correspondant dans la base de données,
 * vérifie que l'utilisateur actuel est l'auteur du post, et si c'est le cas, valide le nouveau titre et met à jour le post.
 * L'utilisateur est ensuite redirigé vers la page du forum.
 * Si le titre n'est pas valide ou si l'utilisateur actuel n'est pas l'auteur du post, une vue d'erreur est renvoyée.
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

$currentUserId = 1;

/** @var array $postforum Post du forum récupéré de la base de données. */
$postforum = $pdo->query('select * from post_forum where id_post = :id_post', [
    'id_post' => $_POST['id']
])->findOrFail();

// Autorise seulement si l'utilisateur actuel est l'auteur du post
authorize($postforum['ID_USER'] === $currentUserId);

// Validation du formulaire
$errors = [];

if (! Validator::string($_POST['titre'], 1, 500)) {
    $errors['titre'] = 'Un titre de pas plus de 500 caractères est requis';
}

// Si il y a des erreurs de validation, renvoie à la vue d'édition du post
if (count($errors)) {
    return view('forum/edit.view.php', [
        'errors' => $errors,
        'post' => $postforum
    ]);
}

// Met à jour le post dans la base de données
$pdo->query('update post_forum set TITRE = :TITRE where id_post = :id_post', [
    'id_post' => $_POST['id'],
    'TITRE' => $_POST['titre']
]);

// Redirige l'utilisateur.
header('location: /forum');
die();