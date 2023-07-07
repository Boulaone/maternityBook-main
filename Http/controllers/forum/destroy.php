<?php

/**
 * Supprime un post du forum si l'utilisateur actuel est l'auteur du post.
 *
 * Ce script récupère l'identifiant du post envoyé via POST, trouve le post correspondant dans la base de données,
 * vérifie que l'utilisateur actuel est l'auteur du post, et si c'est le cas, supprime le post de la base de données.
 * Ensuite, il redirige l'utilisateur vers la page du forum.
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
    'id_post' => $_POST['id_post']
])->findOrFail();

// Autorise seulement si l'utilisateur actuel est l'auteur du post
authorize($postforum['ID_USER'] == $currentUserId);

// Supprime le post du forum
$pdo->query('delete from post_forum where id_post = :id_post', [
    'id_post' => $_POST['id_post']
]);

// Redirige vers la page du forum
header('location: /forum');
exit();
