<section id="form_inscription" class="formulaire">
    <button class="btn btn-danger btn_close" id="close_inscription">X</button>
    <img src="/assets/img/logo_coul_nom.jpg" alt="Logo Maternity Box">
    <h4>Rejoignez-nous</h4>
    <form action="/register" method="POST">
        <!-- Sécurise les formulaires contre les attaques CSRF -->
        <input type="hidden" name="csrf_token" value="<?php echo \Core\Session::get('csrf_token'); ?>">

        <div>
            <input type="text" name="nom" placeholder="Nom">
            <input type="text" name="prenom" placeholder="Prénom">
        </div>
        <div>
            <input type="email" name="email" placeholder="E-Mail">
            <?php if (isset($errors['email'])): ?>
                <p class="error"><?php echo $errors['email']; ?></p>
            <?php endif; ?>
        </div>
        <div>
            <input type="password" name="password" placeholder="Mot de passe">
        </div>
        <div>
            <input type="password" name="password_confirm" placeholder="Confirmer le mot de passe">
        </div>
        <button type="submit" class="btn btn-primary my-5">S'inscrire</button>
    </form>
    <a class="btn btn-primary" href="https://accounts.google.com" role="button">S'inscrire avec Google</a>
    <a class="btn btn-primary" href="https://www.facebook.com/" role="button">S'inscrire avec Facebook</a>
    <a class="btn btn-primary btn_connexion" href="https://appleid.apple.com/" role="button">S'inscrire avec Apple</a>
    <p>Déjà membre ?</p>
    <button class="btn btn-primary btn_connexion">Se connecter</button>
</section>