<?php

use Core\Authenticator;

// Log Out l'utilisateur
$authenticator = new Authenticator();
$authenticator->logout();

header('location: /');
exit();
