<?php require base_path('views/includes/base.layout.php') ?>

<?php require base_path('views/includes/banner.php') ?>
<?php require base_path('views/includes/slideshow.php')?>

    <main>

        <section>
            <div class="container">
                <div class="row mt-10" id="blog">
                    <div class="col-md-10">
                        <h2>Blog</h2>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Rechercher un sujet">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button"
                                        onclick="window.location.href = 'category.php';">Rechercher
                                </button>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <a href="/blog/create" class="btn btn-primary col-10 btn-sm">Créer Un Post</a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-10">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="#">Liste des messages</a>
                                    <span class="mx-2"></span>
                                    <a href="category.php">Liste des catégories</a>
                                </li>
                                <li class="list-group-item">Les Posts</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-10">
                    <h2>Posts récents</h2>
                    <div class="list-group">

                        <form method="GET action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="hidden" name="offset" value="<?php echo $offset + 10; ?>">
                        <button class="btn btn-primary" type="submit">Posts suivants</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php
echo $footer;
