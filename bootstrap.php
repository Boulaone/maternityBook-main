<?php

use Core\App;
use Core\Container;
use Core\Database;

/**
 * Instance du conteneur d'injection de dépendances.
 *
 * @var Container
 */
$container = new Container();

/**
 * Configuration de la base de données.
 *lie l'instance de Database au container d'injection de dépendances.
 * @var array
 */
$container->bind('Core\Database', function () {
    $config = require base_path('config.php');

    /**
     * Instance de la classe Database avec la configuration de la base de données.
     *
     * @var Database
     */
    return new Database($config['database']);
});

/**
 * Définit le conteneur d'injection de dépendances dans l'application.
 */
App::setContainer($container);