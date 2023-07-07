<?php

use Core\Authenticator;
use Core\ValidationException;
use Core\Validator;

if (!empty($_POST)) {
    try {
        if (!Validator::email($_POST['email'])) {
            throw new ValidationException(['email' => 'Adresse email non valide'], $_POST);
        }
        $authenticator = new Authenticator();
        if (!$authenticator->attempt($_POST['email'], $_POST['password'])) {
            throw new ValidationException(['password' => 'Invalid password'], $_POST);
        }

        // Rediriger l'utilisateur en fonction de son rôle
        $user = $_SESSION['user'];
        if ($user->role === 'admin') {
            header('location: /views/tb_admin.php');
        } elseif ($user->role === 'abonne_p' || $user->role === 'abonne_sec') {
            header('location: /views/index.view.php');
        } else {
            header('location: /index.view.php');
        }
        exit();
    } catch (ValidationException $e) {
        view("session/create.view.php", [
            'errors' => $e->errors,
            'old' => $e->old,
        ]);
    }
} else {
    echo '<div class="alert alert-danger">Veuillez saisir une adresse email et un mot de passe valides.</div>';
}
