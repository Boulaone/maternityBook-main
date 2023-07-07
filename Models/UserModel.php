<?php

namespace Models;

use PDO;

class UserModel {

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getUser(){

        $query = $this->pdo->prepare("
            SELECT u.id_user, u.pseudo, u.email, u.prenom, u.nom, u.photo_profil, u.id_grossesse, u.id_parent, g.partage_compte, g.date_accouchement, g.date_conception, g.date_regles, p.lien_parente, p.enceinte
            FROM USER u
            LEFT JOIN GROSSESSE g ON u.id_grossesse = g.id_grossesse
            LEFT JOIN PARENT p ON u.id_parent = p.id_parent
            WHERE u.id_user = :id");

        $query->execute([
            'id' => intval($_SESSION['id'])
        ]);
        $user = $query->fetch();

        // Calcul semaines de Grossesse et jour d'accouchement prévu
        $dateActuelle = new DateTime();

        if ($user->date_accouchement) {
            $diff = $user->date_accouchement->diff($dateActuelle);
            $user->jours_avant = $diff->days;
            $semaine = ceil($diff->days/7);
            $user->semaine = $semaine;
            $user->jour = ($diff->days % 7);
        } else if ($user->date_conception) {
            $dateConception = new DateTime($user->date_conception);
            $diff = $dateActuelle->diff($dateConception);
            $semaine = ceil($diff->days/7);
            $user->semaine = $semaine;
            $user->jour = ($diff->days % 7);
            $date = clone $dateConception;
            $date->modify('+9 mouths');
            $user->date_accouchement = $date->format('Y-m-d');
        }else if ($user->date_regles){
            $dateRegles = new DateTime($user->date_regles);
            $diff = $dateActuelle->diff($dateRegles);
            $semaine = ceil($diff->days/7) -2;
            $user->semaine = $semaine;
            $user->jour = ($diff->days % 7);
            $date = clone $dateRegles;
            $date->modify('+9 mouths +2 weeks');
            $user->date_accouchement = $date->format('Y-m-d');
        }else{
            $user->semaine = 1;
        }

        // Calcul trimestre en cours
        $user->trimestre = 1;
        if ($user->semaine > 36) {
            $user->trimestre = 4;
        } else if ($user->semaine > 24) {
            $user->trimestre = 3;
        } else if ($user->semaine > 12){
            $user->trimestre = 2;
        }

        // Calcul jours avant accouchement & congé maternité
        $dateAccouchement = new DateTime($user->date_accouchement);
        $diff = $dateAccouchement->diff($dateActuelle);
        $user->jours_avant = $diff->days;
        $user->congeMat = $user->jours_avant -60;

        // Re-formattage date accouchement
        $user->date_accouchement_f = DateTime::createFromFormat('Y-m-d', $user->date_accouchement)->format('d/m/Y');

        // Si table PARENT n'existe pas, lien de parenté prend 'Maman' par default
        if (!isset($user->lien_parente)) {
            $user->lien_parente = 'Maman';
        }
        return $user;
    }


    // Détermine à partir quelle semaine on commence le semainier, en fonction du trimestre en cours et affiche le titre
    public function infoTrimestre($numTrimestre){
        $premiereSemaine = 1;
        switch ($numTrimestre) {
            case '4':
                $premiereSemaine = 36;
                $titreTrimestre = 'Phase Finale';
                break;
            case '3':
                $premiereSemaine = 24;
                $titreTrimestre = '3ème Trimestre';
                break;
            case '2':
                $premiereSemaine = 12;
                $titreTrimestre = '2ème Trimestre';
                break;
            default:
                $titreTrimestre = '1er Trimestre';
                break;
        }
        return array('semaine' => $premiereSemaine, 'titre' => $titreTrimestre);
    }


    public function getBabies ($user){

        $query = $this->pdo->prepare("
            SELECT id_bebe, sexe, prenom, id_grossesse
            FROM BEBE
            WHERE id_grossesse = :id_grossesse");

        $query->execute([
            'id_grossesse' => $user->id_grossesse
        ]);

        $bebes = $query->fetchAll();
        return $bebes;
    }

    public function getChildrens ($user){

        $query = $this->pdo->prepare("
        SELECT id_parent, lien_parente, poids_nais, taille_nais, groupe_sang, date_nais, id_grossesse
        FROM PARENT
        WHERE id_grossesse = :id_grossesse
        AND (lien_parente = 'frere' OR 'soeur')");

        $query->execute([
            'id_grossesse' => $user->id_grossesse
        ]);

        $enfants = $query->fetchAll();
        return $enfants;
    }

    public function getParents ($user){

        $query = $this->pdo->prepare("
        SELECT id_parent, lien_parente, poids_nais, taille_nais, groupe_sang, date_nais, id_grossesse
        FROM PARENT
        WHERE id_grossesse = :id_grossesse
        AND (lien_parente = 'maman' OR 'papa')");

        $query->execute([
            'id_grossesse' => $user->id_grossesse
        ]);

        $parents = $query->fetchAll();
        return $parents;
    }

    public function getRdv ($user){

        $query = $this->pdo->prepare ("
        SELECT r.id_rdv, r.titre, r.body, r.date, r.id_grossesse, r.id_medical, m.nom, m.type
        FROM RDV r
        LEFT JOIN MEDICAL m on r.id_medical = m.id_medical
        WHERE r.id_grossesse = :id_grossesse");

        $query->execute([
            'id_grossesse' => $user->id_grossesse
        ]);

        $rdvs = $query->fetchAll();

        foreach ($rdvs as $rdv) {
            $date = DateTime::createFromFormat('Y-m-d H:i:s', $rdv->date);
            $rdv->dateJour = $date->format('j/n/Y');
            $rdv->heure = $date->format('H\hi');
            $rdv->titreR = substr($rdv->titre, 0, 15) . '...';

            // $rdv->titre
        }
        return $rdvs;
    }

    public function getprochainsRdvs ($user){

        $dateActuelle = date('Y-m-d H:i:s');

        $query = $this->pdo->prepare ("
        SELECT r.id_rdv, r.titre, r.body, r.date, r.id_grossesse, r.id_medical, m.nom, m.type
        FROM RDV r
        LEFT JOIN MEDICAL m on r.id_medical = m.id_medical
        WHERE r.id_grossesse = :id_grossesse
        AND r.date > :date
        ORDER BY r.date ASC
        LIMIT 3");

        $query->execute([
            'id_grossesse' => $user->id_grossesse,
            'date' => $dateActuelle
        ]);

        $rdv = $query->fetchAll();
        return $rdv;
    }

    public function getMedic ($user){

        $query = $this->pdo->prepare ("
        SELECT id_medical, type, nom, adresse, cp, ville, telephone, id_grossesse
        FROM MEDICAL
        WHERE id_grossesse = :id_grossesse");

        $query->execute([
            'id_grossesse' => $user->id_grossesse
        ]);

        $medical = $query->fetchAll();
        return $medical;
    }

    public function pourcentageSemainier($user){

        $query = $this->pdo->prepare ("
        SELECT COUNT(*)
        FROM SEMAINE_GROSSESSE
        WHERE id_grossesse = :id_grossesse
        AND (statut = 'en attente' OR statut = 'valide')");

        $query->execute([
            'id_grossesse' => $user->id_grossesse
        ]);
        $nbSemaine = $query->fetchColumn();
        $pourcentage = $nbSemaine / 0.4;
        return $pourcentage;
    }
}