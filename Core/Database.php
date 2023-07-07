<?php

namespace Core;

use PDO;

/**
 * Classe pour la gestion de la base de données.
 * Permet de se connecter à la base de données et d'exécuter des requêtes.
 */
class Database
{

    /**
     * @var PDO La connexion à la base de données
     * @var \PDOStatement Le dernier énoncé préparé
     */
    public $connection;
    public $statement;

    /**
     * Initialise une nouvelle instance de la classe Database.
     *
     * @param array $config Les paramètres de configuration de la base de données
     * @param string $username Le nom d'utilisateur pour la connexion à la base de données
     * @param string $password Le mot de passe pour la connexion à la base de données
     */
    public function __construct($config, $username = 'root', $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
    }

    /**
     * Prépare et exécute une requête SQL.
     *
     * @param string $query La requête SQL à exécuter
     * @param array $params Les paramètres à lier à la requête
     * @return Database L'instance actuelle de la classe Database
     */
    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;
    }

    /**
     * Récupère toutes les lignes retournées par la dernière requête exécutée.
     *
     * @return array Les lignes retournées par la requête
     */
    public function get()
    {
        return $this->statement->fetchAll();
    }

    /**
     * Récupère la première ligne retournée par la dernière requête exécutée.
     *
     * @return array|false La première ligne retournée par la requête, ou false si aucune ligne n'a été retournée
     */
    public function find()
    {
        return $this->statement->fetch();
    }

    /**
     * Récupère la première ligne retournée par la dernière requête exécutée, ou échoue si aucune ligne n'a été retournée.
     *
     * @return array La première ligne retournée par la requête
     * @throws \Exception Si aucune ligne n'a été retournée par la requête
     */
    public function findOrFail()
    {
        $result = $this->find();

        if (! $result) {
            abort();
        }

        return $result;
    }

    /**
     * Récupère l'ID de la dernière ligne insérée ou la dernière valeur d'un objet séquence,
     * en fonction du pilote sous-jacent.
     *
     * @return string Représentation sous forme de chaîne de l'ID de la dernière ligne insérée.
     */
    public function lastInsertId()
    {
        return $this->connection->lastInsertId();
    }

}