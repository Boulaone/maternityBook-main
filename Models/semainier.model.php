<?php
class SemainierModel {

    // Choisis une couleur aléatoire à définir comme classe pour les titres du semainier
    public function randomColor(){
        $colors = ['color-1', 'color-2', 'color-3'];
        return $colors[array_rand($colors)];
    }

    // Requête pour récupérer le statut d'une semaine en fonction de son numéro et de l'ID_grossesse
    function getSemaine($user, $numSemaine){

        /**
         * @var PDO $pdo
         */
        global $pdo;

        $query = $pdo->prepare ("
        SELECT num_semaine, id_grossesse, statut
        FROM SEMAINE_GROSSESSE
        WHERE ID_GROSSESSE = :id_grossesse
        AND num_semaine = :num_semaine");

        $query->execute([
            'id_grossesse' => $user->id_grossesse,
            'num_semaine' => $numSemaine
        ]);
        $semaineGrossesse = $query->fetch();
        return $semaineGrossesse;
    }

    // Vérifie si une semaine est indisponible, validée ou non remplie et modifie le logo, la couleur et le lien en conséquence
    public function statutSemaine($indiceSemaine, $user, $semaineGrossesse){
        if ($indiceSemaine > $user->semaine) {
            $logo = '<i class="fa-solid fa-xmark"></i>';
            $lien = '#';
            $class= 'indisponible';
        } else {
            $lien = '/forms/form_semaine?semaine=' . $indiceSemaine;
            $class= '';
            if (isset($semaineGrossesse->statut) && (($semaineGrossesse->statut == 'valide') || ($semaineGrossesse->statut == 'en_attente'))){
                $logo = '<i class="fa-solid fa-check"></i>';
            } else {
                $logo = '<i class="fa-solid fa-question"></i>';
            }
        }
        return array('logo' => $logo, 'lien' => $lien, 'class' => $class);
    }

    // Affichage d'une bulle du semainier
    public function showBulle($semainier, $user, $i){
        ob_start();
        $semaineGrossesse = $semainier->getSemaine($user, $i);
        $infoSemaine = $semainier->statutSemaine($i, $user, $semaineGrossesse);
        echo
            '<div class="drop">
                <div class="content '. $infoSemaine['class'] .'">
                    <div class="statut">' . $infoSemaine['logo'] . '</div>
                    <h4>Semaine ' . $i . '</h4>
                    <a href="' . $infoSemaine['lien'] . '">Accéder</a>
                </div>
            </div>';
        $bulleSemainier = ob_get_clean();
        return $bulleSemainier;
    }
}

