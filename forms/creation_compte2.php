<?php
$path = '../';
$css = '/public/assets/css/creation_compte.css';
require '../views/includes/user.layout.php';
require '../Models/profil.model.php';

$conception = null;
$regles = null;

if (isset($_POST['choix_date']) === 'date_conception') {
    $conception = $_POST['date'];
} else if (isset($_POST['choix_date']) === 'date_regles') {
    $regles = $_POST['date'];
}

$queryGrossesse = $pdo->prepare("
            INSERT INTO GROSSESSE (date_conception, date_regles)
            VALUES(:conception,:regles)");

$queryGrossesse->execute([
    'conception' => $conception,
    'regles' => $regles
]);

$idGrossesse = $pdo->lastInsertId();

$queryUser = $pdo->prepare("
            UPDATE USER
            SET id_grossesse = :id_grossesse
            WHERE id_user = :id_user
            ");

$queryUser->execute([
    'id_grossesse' => $idGrossesse,
    'id_user' => intval($_SESSION['id'])
]);
?>
    <main>
        <h1>Apprenons-en un peu plus sur vous...</h1>

        <form action="/user" method="POST">
            <?php if ($_POST['statut'] !== 'celibataire') {
                echo '<label for="conjoint">Prénom du conjoint</label>
            <input type="text" name="conjoint">';
            } ?>
            <label for="partage">Choisissez une option :</label>
            <div class="div_form">
                <input type="radio" name="partage" value="compte_partage">
                <label for="compte_partage">Compte Partagé</label>
                <input type="radio" name="partage" value="compte_commun">
                <label for="compte_commun">Compte solo/commun</label>
            </div>
            <li>
                <ul>Le compte partagé permet à de se connecter au tableau de bord via 2 comptes distincts, le votre et celui de votre conjoint par exemple.</ul>
                <ul>Le compte solo, ou commun, permet de tout gérer via un seul et même compte.</ul>
            </li>
            <?php
            if ($_POST['enfants'] !== null) {
                echo '<p>Je rentre les informations de mes enfants :</p><div id="enfants">';
                for ($i = 1; $i <= $_POST['enfants']; $i++) {
                    echo '<div>
                <label for="prenom_enfant' . $i . '">Prénom de l\'enfant ' . $i . '</label>
                <input type="text" name="prenom_enfant' . $i . '">
                <label for="date_nais_enfant' . $i . '">Date de naissance</label>
                <input type="date" name="date_nais_enfant' . $i . '">
            </div>';
                }
                echo '</div>';
            } ?>
            <br>
            <div class="hidden">
                <label for="choix_date"></label>
                <input type="text" for="choix_date" value="<?= $_POST['choix_date'] ?>"></input>
            </div>


            <input type="submit" value="Valider">
        </form>
    </main>
    <script src="/public/assets/js/creation_livre.js"></script>
<?php
echo $footer;