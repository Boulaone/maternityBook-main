<?php

use Core\App;
use Core\Database;

$pdo = App::resolve(Database::class);

$currentUserId = 1;

$postforum = $pdo->query('select * from post_forum where id_post = :id_post', [
    'id_post' => $_GET['id']
])->findOrFail();

authorize($postforum['ID_USER'] == $currentUserId);

view("forum/show.view.php", [
    'postforum' => $postforum
]);
