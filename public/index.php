<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Commande à faire au démarrage du serveur pour lui dire quelle est la route du document
// php -S localhost:8000 -t public

use Core\Session;
use Core\ValidationException;

/**
 * Chemin de base de l'application.
 */
const BASE_PATH = __DIR__ . '/../';

session_start();

require BASE_PATH . '/vendor/autoload.php';

require BASE_PATH . 'Core/functions.php';

require base_path('bootstrap.php');

/**
 * Instance du routeur de l'application et
 * Tableau des routes de l'application.
 *
 * @var \Core\Router
 * @var array
 */
$router = new \Core\Router();
$routes = require base_path('routes.php');

/**
 * URI de la requête et
 * Méthode de la requête.
 *
 * @var string
 */
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];

/**
 * Exécute la méthode de routage correspondant à l'URI et à la méthode de la requête.
 */
try {
    $router->route($uri, $method);
    /**
     * Gère les exceptions de validation en enregistrant les erreurs et les données de la requête précédente dans la session.
     * Redirige ensuite vers l'URL précédente.
     */
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    return redirect($router->previousUrl());
}

/**
 * Supprime les messages flash de la session.
 */
Session::unflash();