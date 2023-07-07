<?php

namespace Core;

use Exception;

/**
 * Conteneur de gestion des dépendances.
 * Permet de lier et de résoudre des dépendances.
 */
class Container
{

    /**
     *
     * @var array Le tableau contenant les liaisons de dépendances
     */
    protected array $bindings = [];

    /**
     * Lie une clé à un résolveur.
     *
     * @param string $key La clé à lier.
     * @param mixed $resolver Le résolveur à lier à la clé.
     * @return void
     */
    public function bind(string $key, mixed $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }

    /**
     * Résout une clé en la valeur liée.
     *
     * @param string $key La clé à résoudre
     * @return mixed La valeur liée à la clé
     * @throws Exception Si aucune liaison n'est trouvée pour la clé
     */
    public function resolve(string $key): mixed
    {
        if (! array_key_exists($key, $this->bindings)) {
            throw new Exception("Pas de liaison trouvée pour {$key}");

        }

        $resolver = $this->bindings[$key];

        return call_user_func($resolver);
    }
}