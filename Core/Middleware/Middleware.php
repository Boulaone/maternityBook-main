<?php

namespace Core\Middleware;

class Middleware
{
    /**
     * Map des middleware avec leurs clés correspondantes.
     */
    public const MAP = [
        'guest'=> Guest::class,
        'auth' => Auth::class
    ];

    /**
     * Résout et exécute le middleware correspondant à la clé donnée.
     *
     * @param string $key Clé correspondant au middleware.
     * @throws Exception Si aucun middleware correspondant n'est trouvé pour la clé donnée.
     */
    public static function resolve($key)
    {
        if (!$key) {
            return;
        }

        /**
         * Middleware correspondant à la clé donnée.
         */
        $middleware = static::MAP[$key] ?? false;

        if (!$middleware) {
            throw new \Exception("Pas de middleware correspondant trouvé pour cette key '{$key}'.");
        }

        /**
         * Exécute le middleware.
         */
        (new $middleware)->handle();
    }
}