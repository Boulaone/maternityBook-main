<?php

$path = '../';
$css = '/public/assets/css/creation_compte.css';
require '../views/includes/user.layout.php';
require '../Models/profil.model.php';
?>
    <main>
        <h1>Apprenons-en un peu plus sur vous...</h1>
        <form action="creation_compte2.php" method="POST">
            <label for="sexe">Je suis :</label>
            <div class="div_form">
                <input type="radio" name="sexe" value="maman">
                <label for="maman">Future Maman</label>
                <input type="radio" name="sexe" value="papa">
                <label for="papa">Futur Papa</label>
            </div>
            <label for="choix_date">Choisissez une option :</label>
            <select id="choix_date" name="choix_date">
                <option value="date_conception">Je connais ma date de conception</option>
                <option value="date_regles">Je connais ma date des dernières règles</option>
                <option value="">Je ne connais aucune des deux</option>
            </select>
            <div id="date">
                <label for="date">Choisissez une date :</label>
                <input type="date" name="date">
            </div>
            <label for="cycles">Durée moyenne des cycles :</label>
            <input type="number" name="cycles">
            <label for="statut">Je suis :</label>
            <div class="div_form">
                <input type="radio" name="statut" value="celibataire">
                <label for="celibataire">Célibataire</label>
                <input type="radio" name="statut" value="couple_homme">
                <label for="homme">En couple avec un homme</label>
                <input type="radio" name="statut" value="couple_femme">
                <label for="femme">En couple avec une femme</label>
            </div>
            <label for="enfants">Combien de frère(s) et sœur(s) votre bout de choux aura t-il ?</label>
            <input type="number" name="enfants">
            <label for="pseudo">Je choisis un pseudo pour le forum (Optionnel) :</label>
            <input type="text" name="pseudo">
            <br>
            <input type="submit" value="Page Suivante">
        </form>
    </main>
    <script src="/public/assets/js/creation_livre.js"></script>

<?php
echo $footer;