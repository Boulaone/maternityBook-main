<?php
$path = '../';
$css = '/public/assets/css/creation_profil.css';
require '../views/includes/user.layout.php';
require '../Models/profil.model.php';

$profilFunctions = new ProfilModel();

if (isset($_GET['conjoint'])) {
    $profil = $profilFunctions->getConjointProfile($user);
} else {
    $profil = $profilFunctions->getUserProfile($user);
}
$enfants = $profilFunctions->getChildrensProfile($user);

?>

<main>
    <section class="image-profil">
        <img src="<?php echo isset($profil->image_profil) ? $profil->image_profil : "/public/assets/img/img_profil.jpg"; ?>" alt="image profil">
    </section>
    <section>
        <form>
            <div class="ligne">
                <label for="prenom"></label>
                <input type="text" name="prenom" placeholder="Prénom" value="<?php echo isset($profil->prenom) ? $profil->prenom :''?>">
                <label for="nom"></label>
                <input type="text" name="nom" placeholder="Nom de famille" value="<?php echo isset($profil->nom) ? $profil->nom :''?>">
            </div>
            <div class="ligne">
                <div class="colonne">
                    <label for="date_naissance">Date de naissance</label>
                    <input type="date" name="date_naissance" value="<?php echo isset($profil->date_nais) ? $profil->date_nais :''?>">
                </div>
                <div class="colonne">
                    <label for="departement"></label>
                    <input type="text" placeholder="Département" name="departement" value="<?php echo isset($profil->departement_nais) ? $profil->departement_nais :''?>">
                    <label for="ville_naissance"></label>
                    <input type="text" placeholder="Ville de naissance" name="ville_naissance" value="<?php echo isset($profil->ville_nais) ? $profil->ville_nais :''?>">
                </div>
            </div>
            <div class="ligne">
                <label for="poids">Je pesais </label>
                <input type="number" step="0.01" placeholder="kg" name="poids" value="<?php echo isset($profil->poids_nais) ? $profil->poids_nais :''?>">
                <label for="taille"> et je mesurais </label>
                <input type="number" step="0.01" placeholder="cm" name="taille" value="<?php echo isset($profil->taille_nais) ? $profil->taille_nais :''?>">
            </div>
            <div class="ligne">
                <label for="groupe_sanguin">Mon Groupe Sanguin est</label>
                <select id="groupe_sanguin" name="groupe_sanguin" value="<?php echo isset($profil->groupe_sang) ? $profil->groupe_sang :''?>">
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
            </div>
            <button type="submit">Valider</button>
        </form>
    </section>
    <section>
        <article class="ligne">
            <hr>
            <h5>Mes Clichés</h5>
            <hr>
        </article>
        <article class="mes-cliches">
            <div class="cliche">
                <h6>Bébé</h6>
                <i class="fa-solid fa-upload"></i>
                <p>Importez une photo de vous bébé</p>
            </div>
            <div class="cliche">
                <h6>Actuel</h6>
                <i class="fa-solid fa-upload"></i>
                <p>Importez une photo de vous maintenant</p>
            </div>
        </article>
    </section>
    <section>
        <article class="ligne">
            <hr>
            <h5>Maternité</h5>
            <hr>
        </article>
        <article class="maternite">
            <button>Selectionner ma Maternnité</button>
        </article>
    </section>
</main>