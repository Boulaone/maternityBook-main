<?php
$path = '../../';
$css = '/public/assets/css/calendrier.css';
require '../includes/user.layout.php';

//Vérifie si mois et année présents dans URL ou place calendrier sur mois actuel
if (isset($_GET['mois']) && isset($_GET['annee']) && ctype_digit($_GET['mois']) && ctype_digit($_GET['annee'])) {
    $mois = $_GET['mois'];
    $annee = $_GET['annee'];
} else {
    $mois = $dateActuelle->format('n');
    $annee = $dateActuelle->format('Y');
}

// Récupère infos liées au mois sélectionné
$nomMois = $moisTab[intval($mois) - 1];
$nbJoursMois = cal_days_in_month(CAL_GREGORIAN, $mois, $annee);
$premierJour = new DateTime("$annee-$mois-01");
$numPremierJour = $premierJour->format('N');

// Détermine mois précédent
$moisPrecedent = $mois - 1;
$anneePrecedente = $annee;
if ($moisPrecedent == 0) {
    $moisPrecedent = 12;
    $anneePrecedente--;
}

// Détermine mois suivant
$moisSuivant = $mois + 1;
$anneeSuivante = $annee;
if ($moisSuivant == 13) {
    $moisSuivant = 1;
    $anneeSuivante++;
}
?>
    <main id="main-calendrier">
        <section id="titre">
            <a href="/views/user/calendrier.php?mois=<?= $moisPrecedent ?>&annee=<?= $anneePrecedente ?>" id="mois-prec"><i class="fa-solid fa-circle-chevron-left"></i></a>
            <h2><?php echo $nomMois . ' ' . $annee; ?></h2>
            <a href="/views/user/calendrier.php?mois=<?= $moisSuivant ?>&annee=<?= $anneeSuivante ?>" id="mois-suiv"><i class="fa-solid fa-circle-chevron-right"></i></a>
        </section>
        <section id="semaine">
            <?php
            foreach ($semaineTab as $jourSemaine) {
                echo "<div class='jour-semaine'>$jourSemaine</div>";
            }
            ?>
        </section>
        <section id="calendrier">
            <?php

            $jourMois = 1;
            $jourSemaine = 1;
            $dateJour = $dateActuelle->format('j/n/Y');

            // Affichage cases vides début mois si besoin
            while ($jourSemaine < $numPremierJour) {
                echo '<div class="jour"></div>';
                $jourSemaine++;
            }

            // Affichage des jours
            while ($jourMois <= $nbJoursMois) {
                $date = $jourMois . '/' . $mois . '/' . $annee;
                echo '<div class="jour jour-mois" ';

                // Vérifie si jour du calendrier = jour actuel
                if ($date == $dateJour) {
                    echo 'id="jour-actuel"';
                }
                echo '><div class="ligne-jour"><p>' . $jourMois. '</p><a href="#" class="btn-plus"><span class="btn-text">+</span><span class="btn-hover">Ajouter un évènement +<span></a></div><div class="rdvs">';
                // Affiche pour chaque jour les RDV correspondant
                foreach ($rdvs as $rdv) {
                    if ($rdv->dateJour == $date) {
                        echo '<div class="rdv">' . $rdv->heure . ' : ' . $rdv->titreR . '</div>';
                    }
                }

                echo '</div></div>';
                if ($jourSemaine == 7) {
                    $jourSemaine = 1;
                } else {
                    $jourSemaine++;
                }
                $jourMois++;
            }

            // Affichage cases vides fin mois si besoin
            if ($jourSemaine != 1) {
                while ($jourSemaine <= 7) {
                    echo '<div class="jour"></div>';
                    $jourSemaine++;
                }
            }
            ?>
        </section>
    </main>
    <script src="/public/assets/js/calendrier.js"></script>
<?php
echo $footer;
