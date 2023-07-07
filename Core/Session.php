<?php

namespace Core;

/**
 * Classe pour la gestion de la session.
 * Fournit des méthodes pour stocker et récupérer des données dans la session,
 * gérer les messages flash, et gérer la durée de vie de la session.
 */
class Session
{
    /**
     * Vérifie si une clé existe dans la session.
     *
     * @param string $key La clé à vérifier
     * @return bool True si la clé existe, False sinon
     */
    public static function has(string $key): bool
    {
        return (bool)static::get($key);
    }

    /**
     * Stocke une valeur dans la session avec la clé spécifiée.
     *
     * @param string $key La clé à utiliser pour stocker la valeur
     * @param mixed $value La valeur à stocker
     */
    public static function put(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Récupère une valeur de la session en fonction de la clé spécifiée.
     * Si la clé n'existe pas, retourne la valeur par défaut.
     *
     * @param string $key La clé à utiliser pour récupérer la valeur
     * @param mixed|null $default La valeur par défaut à retourner si la clé n'existe pas
     * @return mixed La valeur récupérée ou la valeur par défaut
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        if (isset($_SESSION['_flash'][$key])) {
            return $_SESSION['_flash'][$key];
        }
        return $_SESSION[$key] ?? $default;
    }

    /**
     * Stocke temporairement une valeur dans la session (dans le tableau `_flash`)
     * pour une seule requête.
     *
     * @param string $key La clé à utiliser pour stocker la valeur flash
     * @param mixed $value La valeur à stocker
     */
    public static function flash(string $key, mixed $value): void
    {
        $_SESSION['_flash'][$key] = $value;
    }

    /**
     * Supprime les données flash de la session.
     */
    public static function unflash(): void
    {
        unset($_SESSION['_flash']);
    }

    /**
     * Supprime toutes les données de la session.
     */
    public static function flush(): void
    {
        $_SESSION = [];
    }

    /**
     * Détruit la session et supprime le cookie de session.
     */
    public static function destroy(): void
    {
        static::flush();

        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }

    /**
     * Génère un nouveau jeton CSRF et le stocke dans la session.
     * Retourne le jeton généré.
     *
     * @return string Le jeton CSRF
     */
    public static function generateCsrfToken(): string
    {
        $token = bin2hex(random_bytes(32));
        static::put('csrf_token', $token);
        return $token;
    }
}