<?php

use Core\App;
use Core\Database;

$pdo = App::resolve(Database::class);

$post_forum = $pdo->query('select * from post_forum where ID_USER = 1')->get();

view("forum/index.view.php", [
    'post_forum' => $post_forum
]);