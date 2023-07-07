<?php
$path = '../../';
$css = '/public/assets/css/profil.css';
require '../includes/user.layout.php';
require '../../Models/profil.model.php';


$profilFunctions = new ProfilModel();
$conjoint = $profilFunctions->getConjointProfile($user);
$trimestre = $userFunctions->infoTrimestre($user->trimestre);
?>
    <main>
        <section class="profil">
            <article class="parent">
                <img src="/public/assets/img/img_profil.jpg" alt="image profil">
                <a href="/forms/creation_profil">Modifier profil <?= $user->lien_parente ?></a>
            </article>
            <article class="parent">
                <?php
                if ($conjoint != null) {
                    echo '<img src="'. $conjoint->image_profil .'" alt="image profil">';
                    if ($user->partage_compte == 1) {
                        echo '<a href="/forms/creation_profil?conjoint=1">Afficher profil Conjoint</a>';
                    } else {
                        echo '<a href="/forms/creation_profil?conjoint=1">Modifier profil Conjoint</a>';
                    }
                } else {
                    echo '<img src="/public/assets/img/plus_rond.png" alt="image profil">
                    <a href="/forms/creation_profil?conjoint=1">Créer profil Conjoint</a>';
                }
                ?>
            </article>
        </section>
        <section class="resume">
            <h2><?php echo $user->prenom;
                if ($conjoint != null) {
                    echo ' & ' . $conjoint->prenom;
                }
                ?></h2>
            <article class="jour-accouchement">
                <?php if ($user->date_accouchement) {
                    echo '<h3>J - '. $user->jours_avant .'</h3>
                <p>avant votre accouchement</p><p>prévu le '. $user->date_accouchement_f;
                } else {
                    echo '<p>aucune date d\'accouchement prévue pour le moment</p>';
                }
                ?>
            </article>
            <article>
                <p>Vous êtes dans votre</p>
                <p class="info-grossesse"><?= $trimestre['titre'] ?> de l'aventure</p>
            </article>
            <article>
                <p>plus exactement à</p>
                <p class="info-grossesse"><?= $user->semaine ?> semaine(s) de grossesse + <?= $user->jour ?> jour(s)</p>
            </article>
            <article>
                <p>Votre prochain Rendez-vous :</p>
                <p class="info-grossesse">
                    <?php
                    if ($prochainsRdvs !== null) {
                        echo $prochainsRdvs[1]->titre;
                    } else {
                        echo 'aucun RDV à venir';
                    }
                    ?>
                </p>
            </article>
            <article>
                <p>Votre congé maternité commence dans </p>
                <p class="info-grossesse"><?= $user->congeMat ?> jours</p>
            </article>
        </section>
    </main>



<?php
echo $footer;
