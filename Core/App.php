<?php

namespace Core;

/**
 * Classe principale de l'application.
 * Fournit un conteneur pour la gestion des dépendances.
 */
class App {
    /**
     * utilisée pour accéder au conteneur et effectuer des opérations,
     * telles que l'enregistrement de dépendances ou la résolution de dépendances.
     * @var Container Le conteneur de l'application
     */
    protected static $container;

    /**
     * Définit le conteneur de l'application.
     *
     * @param Container $container Le conteneur à utiliser
     */
    public static function setContainer($container): void
    {
        static::$container = $container;
    }

    /**
     * Renvoie le conteneur de l'application.
     *
     * @return Container Le conteneur de l'application
     */
    public static function container(): Container
    {
        return static::$container;
    }

    /**
     * Ajoute un élément au conteneur. Elle prend une clé et une valeur (appelée résolveur) en paramètres.
     * clé est utilisée pour identifier l'élément, et le résolveur peut être une fonction ou une classe
     * sera invoquée pour résoudre la dépendance lorsque celle-ci sera demandée.
     *
     * @param string $key La clé de l'élément
     * @param mixed $resolver La valeur de l'élément
     */
    public static function bind(string $key, mixed $resolver): void
    {
        static::container()->bind($key, $resolver);
    }

    /**
     * Récupère un élément du conteneur.
     *
     * @param string $key La clé de l'élément à récupérer
     * @return mixed L'élément correspondant à la clé donnée
     * @throws Exception
     */
    public static function resolve(string $key): mixed
    {
        return static::container()->resolve($key);
    }
}
