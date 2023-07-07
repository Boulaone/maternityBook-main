<div class="ombrage"></div>
<section id="form_connexion" class="formulaire">
    <button class="btn btn-danger btn_close" id="close_connexion">X</button>
    <img src="/assets/img/logo_coul_nom.jpg" alt="Logo Maternity Box">
    <form action="/session" method="post">
        <div>
            <input type="email" name="email" placeholder="E-Mail">
        </div>
        <div>
            <input type="password" name="password" placeholder="Mot de passe" autocomplete="new-password">
        </div>
        <button type="submit" class="btn btn-primary my-5" id="btn_login">Se connecter</button>
    </form>
    <a class="btn btn-primary" href="https://accounts.google.com" role="button">Se connecter avec Google</a>
    <a class="btn btn-primary" href="https://www.facebook.com/" role="button">Se connecter avec Facebook</a>
    <a class="btn btn-primary" href="https://appleid.apple.com/" role="button">Se connecter avec Apple</a>
    <p>Pas de compte ?</p>
    <button class="btn btn-primary btn_inscription">S'inscrire</button>



    <div id="erreur_login"></div>
</section>
