<?php

namespace Core\Middleware;

/**
 * Middleware d'authentification.
 */
class Auth
{
    /**
     * Vérifie si l'utilisateur est authentifié.
     * Redirige vers la page du forum si l'utilisateur est authentifié.
     */
    public function handle(): void
    {
        if(! $_SESSION['user'] ?? false) {
            header('location: /forum');
            exit();
        }
    }
}