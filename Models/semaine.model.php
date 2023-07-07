<?php

require_once '../_cnx/connect.php';

class SemaineModel {

    public function createSemaine($grossesse, $semaine){
        // Verifie si la table de jointure avec la semaine correspondante à la grossesse existe, et la créé si ce n'est pas le cas

        /**
         * @var PDO $pdo
         */
        global $pdo;

        $query = $pdo->prepare("
                INSERT INTO SEMAINE_GROSSESSE (id_grossesse, num_semaine)
                SELECT :grossesse, :semaine
                WHERE NOT EXISTS (
                    SELECT 1
                    FROM SEMAINE_GROSSESSE
                    WHERE id_grossesse = :grossesse
                    AND num_semaine = :semaine )");
        $query->execute([
            'grossesse' => $grossesse,
            'semaine' => $semaine
        ]);
    }

    public function selectSemaine($semaine){
        // Select la semaine en cours pour aller chercher toutes les infos nécessaires du formulaire

        /**
         * @var PDO $pdo
         */
        global $pdo;

        $query = $pdo->prepare("
            SELECT num_semaine, fruit, taille, poids, titre_photo, texte_photo
            FROM SEMAINE
            WHERE num_semaine = :semaine");
        $query->execute([
            'semaine' => $semaine
        ]);
        $semaine = $query->fetch();
        return $semaine;
    }

    public function selectForms($semaine){
        // Select les formulaire liés à la semaine actuelle

        /**
         * @var PDO $pdo
         */
        global $pdo;

        $query = $pdo->prepare("
                SELECT num_semaine, intitule FROM FORMULAIRE
                WHERE num_semaine = :semaine
            ");
        $query->execute ([
            'semaine' => $semaine
        ]);

        $forms = $query->fetchAll();
        return $forms;
    }
}