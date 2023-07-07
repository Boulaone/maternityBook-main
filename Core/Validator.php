<?php

namespace Core;

/**
 * Classe Validator
 * Fournit des méthodes statiques pour valider les données d'entrée.
 */
class Validator
{

    /**
     * Vérifie si la valeur est une chaîne de caractères avec une longueur entre les valeurs min et max spécifiées.
     *
     * @param string $value La valeur à valider.
     * @param int $min La longueur minimale de la chaîne. Par défaut à 1.
     * @param float|int $max La longueur maximale de la chaîne. Par défaut à INF.
     * @return bool Retourne true si la valeur est une chaîne dont la longueur est entre les valeurs min et max, sinon false.
     */
    public static function string(string $value, int $min = 1, float|int $max = INF): bool
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    /**
     * Vérifie si la valeur est une adresse email valide.
     *
     * @param string $value La valeur à valider.
     * @return bool Retourne true si la valeur est une adresse email valide, sinon false.
     */
    public static function email(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}