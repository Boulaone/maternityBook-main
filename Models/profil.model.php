<?php

class ProfilModel {

    public function getUserProfile($user){
        /**
         * @var PDO $pdo
         */
        global $pdo;

        $query = $pdo->prepare("        
            SELECT p.id_parent, p.prenom, p.lien_parente, p.poids_nais, p.taille_nais, p.groupe_sang, p.photo_bebe, p.photo_actuel, p.date_nais, p.departement_nais, u.id_user, a.id_avatar
            FROM PARENT p
            LEFT JOIN USER u ON p.id_parent = u.id_parent
            LEFT JOIN AVATAR a ON p.id_parent = a.id_parent
            WHERE u.id_user = :id_user
            ");
        $query->execute([
            'id_user' => $user->id_user]);

        $profilUser = $query->fetch();
        if ($profilUser != null) {
            $profilUser->image_profil = '/public/assets/img/img_profil.jpg';
        }
        return $profilUser;
    }


    public function getConjointProfile($user) {
        /**
         * @var PDO $pdo
         */
        global $pdo;

        $query = $pdo->prepare("        
            SELECT p.id_parent, p.id_grossesse, p.prenom, p.lien_parente, p.poids_nais, p.taille_nais, p.groupe_sang, p.photo_bebe, p.photo_actuel, p.date_nais, p.departement_nais, u.id_user, a.id_avatar
            FROM PARENT p
            LEFT JOIN USER u ON p.id_grossesse = u.id_grossesse
            LEFT JOIN AVATAR a ON p.id_parent = a.id_parent
            WHERE p.id_grossesse = :id_grossesse
            AND u.id_user <> :id_user
            AND (p.lien_parente = 'Maman' OR p.lien_parente = 'Papa')
            LIMIT 1
            ");
        $query->execute([
            'id_grossesse' => $user->id_grossesse,
            'id_user' => $user->id_user]);

        $conjoint = $query->fetch();

        if ($conjoint != null){
            if ($conjoint->id_avatar == null){
                $conjoint->image_profil = '/public/assets/img/plus_rond.png';
            } else {
                $conjoint->image_profil = '/public/assets/img/img_profil.jpg';
            }
        }
        return $conjoint;
    }

    public function getChildrensProfile($user) {
        /**
         * @var PDO $pdo
         */
        global $pdo;

        $query = $pdo->prepare("        
            SELECT p.id_parent, p.id_grossesse, p.prenom, p.lien_parente, p.poids_nais, p.taille_nais, p.groupe_sang, p.photo_bebe, p.photo_actuel, p.date_nais, p.departement_nais, u.id_user, a.id_avatar
            FROM PARENT p
            LEFT JOIN USER u ON p.id_grossesse = u.id_grossesse
            LEFT JOIN AVATAR a ON p.id_parent = a.id_parent
            WHERE p.id_grossesse = :id_grossesse
            AND p.lien_parente IN ('Frere', 'Soeur')
            ");
        $query->execute([
            'id_grossesse' => $user->id_grossesse]);

        $enfants = $query->fetchAll();

        if ($enfants != null){
            foreach ($enfants as $enfant) {
                if ($enfant->lien_parente == 'Soeur') {
                    $enfant->sexe = 'F';
                } else if ($enfant->lien_parente == 'Frere') {
                    $enfant->sexe = 'M';
                }
            }
        }
        return $enfants;
    }

    public function countChildrens($user){
        /**
         * @var PDO $pdo
         */
        global $pdo;
        $query = $pdo->prepare("
            SELECT COUNT(*)
            FROM PARENT
            WHERE id_grossesse = :id_grossesse
            AND lien_parente IN ('Frere', 'Soeur')
            ");
        $query->execute([
            'id_grossesse' => $user->id_grossesse]);

        $nbEnfants = $query->fetchColumn();
        return $nbEnfants;
    }

    // public function createUserProfile($grossesse){
    // }

    // public function createConjointProfile($grossesse){
    // }

    // public function createChildrensProfile($grossesse){
    // }
}