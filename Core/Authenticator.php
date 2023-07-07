<?php

namespace Core;

/**
 * Classe pour l'authentification des utilisateurs.
 */
class Authenticator
{
    /**
     * Tente de connecter un utilisateur en vérifiant les informations d'identification fournies.
     *
     * @param string $email L'adresse e-mail de l'utilisateur.
     * @param string $password Le mot de passe de l'utilisateur.
     * @return bool Retourne true si l'authentification est réussie, sinon false.
     * @throws Exception
     */
    public function attempt(string $email, string $password): bool
    {
        $user = App::resolve(Database::class)
            ->query('SELECT *, password FROM user WHERE email = :email', [
                'email' => $email
            ])->find();

        if ($user && isset($user->password) && password_verify($password, $user->password)) {
            $this->login($user);
            return true;
        }

        return false;
    }

    /**
     * Connecte un utilisateur en enregistrant ses informations dans la session.
     *
     * @param mixed $user L'objet représentant l'utilisateur connecté.
     * @return void
     */

    public function login(mixed $user): void
    {
        $_SESSION['user'] = $user;
        session_regenerate_id(true);
    }

    /**
     * Déconnecte l'utilisateur en détruisant la session.
     *
     * @return void
     */
    public function logout(): void
    {
        Session::destroy();
    }
}