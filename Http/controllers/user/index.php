<?php

use Core\App;
use Core\Database;
use Models\UserModel;

require_once base_path('Models/UserModel.php');

$database = App::resolve(Database::class);
$pdo = $database->connection;

$userModel = new UserModel($pdo);

view("user/index.view.php", [
    'errors' => [],
    'pdo' => $pdo
]);