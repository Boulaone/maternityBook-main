<?php
require_once base_path('Models/UserModel.php');
require_once base_path('Models/date.model.php');
require_once base_path('Models/profil.model.php');

$userFunctions = new UserModel();
$user = $userFunctions->getUser();

$profilFunctions = new ProfilModel();

$profilUser = $profilFunctions->getUserProfile($user);

var_dump($user);
var_dump($profilUser);