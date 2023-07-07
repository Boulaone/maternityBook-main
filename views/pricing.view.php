<?php

$css = '/assets/css/pricing.css';
require base_path('views/includes/base.layout.php')

?>

<main>

    <main id="pricing">
        <h3>Choisissez votre formule</h3>
        <section id="formules">
            <article class="formule">
                <h5>Formule Classique</h5>
                <p class="prix">XX.XX €</p>
                <p>Ecologique & Economique</p>
                <p>Valable 9 mois</p>
                <div>
                    <button class="btn btn-primary" id="pourmoi_classic">Pour moi</button>
                    <button class="btn btn-primary" id="offrir_classic">Pour offrir</button>
                    <hr>
                </div>
                <ul>
                    <li>Personnalisation Couverture</li>
                    <hr>
                    <li>1 Fiche / semaine à remplir</li>
                    <hr>
                    <li>Conseils & Astuces</li>
                    <hr>
                    <li>Couleurs Standards</li>
                    <hr>
                    <li>Edition PDF Téléchargeable</li>
                    <hr>
                </ul>
            </article>
            <article class="formule">
                <h5>Formule Premium</h5>
                <p class="prix">XX.XX €</p>
                <p>Un Souvenir Indélibile</p>
                <p>Valable 9 mois</p>
                <div>
                    <button class="btn btn-primary" id="pourmoi_classic">Pour moi</button>
                    <button class="btn btn-primary" id="offrir_classic">Pour offrir</button>
                    <hr>
                </div>

                <ul>
                    <li>Couverture Personnalisable</li>
                    <hr>
                    <li>1 Fiche / semaine à remplir</li>
                    <hr>
                    <li>Conseils & Astuces</li>
                    <hr>
                    <li>3 Couleurs</li>
                    <hr>
                    <li>Edition Livre Rigide + PDF Téléchargeable</li>
                    <hr>
                    <li>Coffret Cadeau</li>
                    <hr>
                    <li>Choix Orientation (Portrait/Paysage)</li>
                    <hr>
                    <li>10 Fiches Bonus</li>
                </ul>
            </article>
        </section>

    </main>

</main>

<?php
echo $footer;
