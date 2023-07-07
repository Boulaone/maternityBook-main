<?php

/**
 * Permet à l'utilisateur d'éditer un post du forum s'il en est l'auteur.
 *
 * Ce script récupère l'identifiant du post envoyé via GET, trouve le post correspondant dans la base de données,
 * vérifie que l'utilisateur actuel est l'auteur du post, et si c'est le cas, affiche la vue d'édition du post.
 * Si l'utilisateur actuel n'est pas l'auteur du post, une exception d'autorisation est levée.
 *
 * @package Apps\Router\controllers\forum
 * @uses Core\App
 * @uses Core\Database
 */

use Core\App;
use Core\Database;

/** @var Database $pdo Instance de la base de données. */
$pdo = App::resolve(Database::class);

$currentUserId = 1;

/** @var array $postforum Post du forum récupéré de la base de données. */
$postforum = $pdo->query('select * from post_forum where id_post = :id_post', [
    'id_post' => $_GET['id']
])->findOrFail();

// Autorise seulement si l'utilisateur actuel est l'auteur du post
authorize($postforum['ID_USER'] == $currentUserId);

// Affiche la vue d'édition du post
view("forum/edit.view.php", [
    '$errors' => [],
    'post' => $postforum
]);