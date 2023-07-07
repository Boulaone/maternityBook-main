<?php

namespace Core;

use Core\Middleware\Middleware;

/**
 * Classe pour la gestion du routage des requêtes HTTP.
 */
class Router
{

    /**
     * @var array $routes Le tableau des routes définies.
     */
    protected array $routes = [];

    /**
     * Ajoute une route au routeur.
     *
     * @param string $method La méthode HTTP de la route.
     * @param string $uri L'URI de la route.
     * @param string $controller Le contrôleur de la route.
     * @return Router L'instance actuelle de la classe Router.
     */
    public function add(string $method, string $uri, string $controller): static
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];
        return $this;
    }

    /**
     * Ajoute une route GET au routeur.
     *
     * @param string $uri L'URI de la route.
     * @param string $controller Le contrôleur de la route.
     * @return Router L'instance actuelle de la classe Router.
     */
    public function get(string $uri, string $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post(string $uri, string $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete(string $uri, string $controller)
    {
        return $this->add('DELETE', $uri, $controller);

    }

    public function patch(string $uri, string $controller)
    {
        return $this->add('PATCH', $uri, $controller);

    }

    public function put(string $uri, string $controller)
    {
        return $this->add('PUT', $uri, $controller);

    }

    public function only(string $key): static
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }
    /**
     * Route une requête HTTP vers le contrôleur approprié.
     *
     * @param string $uri L'URI de la requête.
     * @param string $method La méthode HTTP de la requête.
     * @return mixed La réponse du contrôleur.
     * @throws Exception Si aucune route ne correspond à la requête.
     */
    public function route(string $uri, string $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                Middleware::resolve($route['middleware']);

                return require base_path('Http/controllers/' . $route['controller']);
            }
        }
        $this->abort();
    }

    /**
     * Renvoie l'URL précédente.
     *
     * @return string L'URL précédente.
     */
    public function previousUrl(): string
    {
        return $_SERVER['HTTP_REFERER'];
    }

    /**
     * Arrête l'exécution du script et renvoie une réponse HTTP avec un code d'erreur spécifique.
     *
     * @param int $code Le code de statut HTTP à renvoyer (par défaut 404)
     * @throws Exception Si le code d'erreur n'est pas pris en charge.
     */
    protected function abort(int $code = 404): void
    {
        http_response_code($code);

        require base_path("views/{$code}.view.php");

        die();
    }
}
