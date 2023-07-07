<?php
$path = '../../';
$css ='/public/assets/css/semainier.css';
require '../includes/user.layout.php';
require '../../Models/semainier.model.php';

$semainier = new SemainierModel;

// Détermine quelle page afficher en fonction du trimestre en cours
if (isset($_GET['page']) && in_array($_GET['page'], range(1,$user->trimestre))) {
    $page = $_GET['page'];
} else {
    $page = $user->trimestre;
}

// Détermine page précédente
$pagePrecedente = $page - 1;
if ($pagePrecedente == 0) {
    $pagePrecedente = $user->trimestre;
}

//Détermine page suivante
$pageSuivante = $page + 1;
if ($pageSuivante > $user->trimestre) {
    $pageSuivante = 1;
}

// Récupère titre et semaine du départ en fonction de la page actuelle
$infoTrimestre = $userFunctions->infoTrimestre($page);
$titreTrimestre = $infoTrimestre['titre'];
$semaineTrimestre = $infoTrimestre['semaine'];

// Choisis une couleur aléatoire pour le titre
$couleurTitre = $semainier->randomColor();

?>

    <main id="main-semainier">
        <h1>Bienvenue sur votre semainier</h1>
        <h3 class="<?= $couleurTitre ?>"><?= $titreTrimestre ?></h3>
        <section>
            <a href="/views/user/semainier.php?page=<?= $pagePrecedente ?>" id="previous"><i class="fa-solid fa-circle-chevron-left"></i></a>
            <article>
                <div class="container">
                    <?php
                    // Affiche le nombre de bulles correspondantes aux nb de semaines, 12 de base et 5 pour le dernier semestre

                    if ($semaineTrimestre === 36) {
                        for ($i = $semaineTrimestre; $i < ($semaineTrimestre + 5); $i++) {
                            $bulleSemainier = $semainier-> showBulle($semainier, $user, $i);
                            echo $bulleSemainier;
                        }
                    } else {
                        for ($i = $semaineTrimestre; $i < ($semaineTrimestre + 12); $i++) {

                            $bulleSemainier = $semainier-> showBulle($semainier, $user, $i);
                            echo $bulleSemainier;
                        }
                    }; ?>
                </div>
            </article>
            <a href="/views/user/semainier.php?page=<?= $pageSuivante ?>" id="next"><i class="fa-solid fa-circle-chevron-right"></i></a>
        </section>
    </main>
<?php
echo $footer;
