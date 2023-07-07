<?php require base_path('views/includes/base.layout.php') ?>
<?php require('includes/banner.php') ?>

<main>

    <main id="index">
        <div class="text-center" id="slogan">
            <p class="mb-0">Porter un enfant, c'est promettre au monde</p>
            <p class="mb-0">un peu d'éternité</p>
        </div>
        <section class="container-fluid mx-0 text-center">
            <div class="row" id="presentation">
                <article class="col-8 mx-0 px-5">
                    <h3>On vous explique...</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi magnam laborum expedita enim?
                        Ullam
                        nihil voluptatibus omnis quisquam nam commodi ipsam sequi, placeat error velit eveniet delectus
                        nostrum explicabo quo.</p>
                    <p>Hic natus facere aut obcaecati rem! Commodi explicabo maxime minus dolorem vero reprehenderit
                        vitae
                        quas inventore accusantium. Mollitia, ad! Perferendis debitis asperiores enim alias a veniam
                        sint
                        minima eligendi repudiandae?
                        Sit, rem nobis unde dignissimos possimus velit corrupti nulla voluptatum pariatur nam explicabo
                        perferendis illum asperiores nisi, suscipit reprehenderit ab. Architecto veniam voluptate sequi
                        mollitia facere, error quod dolor. Quae!</p>
                    <p>Veniam expedita commodi nostrum consectetur, natus similique itaque quisquam harum fuga,
                        cupiditate
                        eos consequuntur repudiandae odio neque quaerat quibusdam porro vel. Omnis, ratione delectus
                        officia
                        enim repudiandae repellat at accusamus?</p>
                    <div class="position-relative">
                        <img src="/assets/img/presentation_livre.png" alt="Livre Maternity Book imprimé"
                             id="img_livre" class="position-relative top-0">
                        <div class="position-absolute text-center px-3" id="explic_couverture">
                            <h6>COUVERTURE PERSONNALISÉE</h6>
                            <hr>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo commodi ab ut, qui corrupti
                                sunt rem, veritatis repellendus rerum delectus asperiores laborum fugiat tempore et
                                mollitia
                                amet impedit possimus cumque!
                                Iste sapiente repellat ducimus asperiores amet ipsam, minus ex id error aliquid delectus
                                iure rerum veniam.</p>
                            <a class="btn btn-primary" href="/pricing.php" role="button">Découvrir</a>
                        </div>
                    </div>
                </article>
                <aside class="col-4 mx-0">
                    <h3 class="my-5">Activez votre carte cadeau</h3>
                    <form action="#" method="post">
                        <input type="text" name="code_cadeau" placeholder="Entrez votre code ici" class="mx-6">
                        <br>
                        <button type="submit" class="btn btn-primary my-5">Découvrir</button>
                    </form>
                    <p class="mx-4 mb-5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor delectus
                        incidunt
                        eius doloribus aliquid distinctio nesciunt, dicta reiciendis deleniti ullam unde, architecto
                        cumque
                        pariatur ad? Ipsam quo molestias dignissimos distinctio!</p>
                    <!-- Photo pour combler le vide, à voir ce qu'on mettra par la suite-->
                    <img src="/assets/img/parent1_400.jpg" alt="Couple avec bébé">
                </aside>
            </div>
        </section>

</main>

<?php
echo $footer;
