<?php
$path = '../';
$css = '/public/assets/css/form_semaine.css';
require '../views/includes/user.layout.php';
require '../Models/semaine.model.php';

//Redirection vers tb_user si l'information saisie en $_GET n'est pas en entier ou n'est pas comprise entre 1 et 40
if (!ctype_digit($_GET['semaine']) || ($_GET['semaine'] > 40) || ($_GET['semaine'] < 1)) {
    header('location: /views/index.view.php');
    exit();
}

$userFunctions = new UserModel();
$semFunctions = new SemaineModel();
$user = $userFunctions->getUser();
$grossesse = intval($user->id_grossesse);
$sem = intval($_GET['semaine']);

$semFunctions->createSemaine($grossesse, $sem);
$semaine = $semFunctions->selectSemaine($sem);
$forms = $semFunctions->selectForms($sem);


?>
<main>
    <a href="/views/user/index.view.php" class="btn">Retour au Tableau de bord</a>
    <section class="section_form">
        <div>
            <h3><?php
                if ($_GET['semaine'] === 1) {
                    echo $_GET['semaine'].'ère Semaine de Grossesse - '.$semaine->fruit;
                } else {
                    echo $_GET['semaine'].'ème Semaine de Grossesse - '.$semaine->fruit;
                }
                ?></h3>
            <div id="info_bebe">
                <h6><?= $semaine->taille ?></h6>
                <h6><?= $semaine->poids ?></h6>
            </div>
            <?php
            if (isset($forms)){
                echo '<form action="#" method="post">';
                foreach ($forms as $form) {
                    echo $form->intitule;
                }
                echo '<input class="btn" type="submit" value="Valider">
                    </form>';
            }
            ?>
        </div>
        <div>
            <img src="/public/assets/img/semaine/sem6.jpg" alt="Image_<?= $semaine->fruit ?>"></img>
            <?php
            if (isset($semaine->titre_photo) && isset($semaine->texte_photo)) {
                echo '<h4>'.$semaine->titre_photo.'</h4>
                     <p>'.$semaine->texte_photo.'</p>
                     <i class="fa-regular fa-arrow-down-to-bracket"></i>
                     <a class="btn" id="importer_photo" href="#">Importer Photo</a>';
            }
            ?>
        </div>
    </section>
    <section>
        <div id="rdv">
            <a class="btn" id="ajouter_rdv" href="#">Ajouter un Rendez-vous</a>
            <i class="fa-regular fa-arrow-down-to-bracket"></i>
        </div>
        <div id="poids">
            <i class="fa-regular fa-weight-hanging"></i>
            <a class="btn" id="ajouter_poids" href="#">Ajouter un Poids</a>
        </div>
    </section>
</main>

