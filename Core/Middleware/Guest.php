<?php

namespace Core\Middleware;

/**
 * Middleware pour les utilisateurs invités (non authentifiés).
 */
class Guest
{
    /**
     * Vérifie si l'utilisateur est un invité (non authentifié).
     * Redirige vers la page d'accueil.
     */
    public function handle(): void
    {
        if($_SESSION['user'] ?? false) {
            header('location: /');
            exit();
        }
    }
}