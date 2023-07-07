<?php

use Core\Response;

/**
 * Fonction dd
 *
 * Affiche la valeur donnée à l'aide de var_dump() dans un format préformaté,
 * puis arrête l'exécution du script en utilisant die().
 *
 * @param mixed $value La valeur à afficher.
 * @return void
 */
function dd(mixed $value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

/**
 * Arrête l'exécution du script et renvoie une réponse HTTP avec un code d'erreur spécifique.
 *
 * @param int $code Le code de statut HTTP à renvoyer (par défaut 404)
 */
function abort(int $code = 404): void
{
    http_response_code($code);

    require base_path("views/{$code}.view.php");

    die();
}

/**
 * Autorise ou non l'accès à une certaine partie de l'application selon une condition donnée.
 *
 * @param bool $condition La condition d'autorisation
 * @param int $status Le code de statut HTTP à renvoyer si la condition est fausse (par défaut 403)
 */
function authorize(bool $condition, int $status = Response::FORBIDDEN): true
{
    if (! $condition) {
        abort($status);
    }
    return true;
}

/**
 * Construit un chemin absolu à partir du chemin de base de l'application et d'un chemin relatif donné.
 *
 * @param string $path Le chemin relatif
 * @return string Le chemin absolu
 */
function base_path(string $path): string
{
    return BASE_PATH . $path;
}

/**
 * Inclut un fichier de vue dans le script actuel.
 *
 * @param string $path Le chemin relatif du fichier de vue.
 * @param array $attributes Les attributs à passer à la vue.
 * @return void
 */
function view(string $path, array $attributes = []): void
{
    extract($attributes);

    require base_path('views/' . $path);
}

/**
 * Redirige l'utilisateur vers une autre URL.
 *
 * @param string $path L'URL vers laquelle rediriger.
 * @return void
 */
function redirect(string $path): void
{
    header("location: {$path}");
    exit();
}

/**
 * Récupère une valeur ancienne (old) d'un formulaire soumis.
 *
 * @param string $key La clé de la valeur ancienne.
 * @param mixed $default La valeur par défaut à retourner si la clé n'existe pas.
 * @return mixed La valeur ancienne correspondante à la clé, ou la valeur par défaut si la clé n'existe pas.
 */
function old(string $key, mixed $default = ''): mixed
{
    return Core\Session::get('old')[$key] ?? $default;
}