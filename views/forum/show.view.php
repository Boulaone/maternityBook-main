<?php require base_path('views/includes/base.layout.php') ?>

<?php require base_path('views/includes/banner.php') ?>
<?php require base_path('views/includes/slideshow.php')?>

<main id="post">

    <p>
        <a href="/forum">Vers la page Forum ...</a>
    </p>
    <div>
        <p><?= htmlspecialchars($postforum['TITRE']) ?></p>
    </div>

    <a href="/post/edit?id=<?= $postforum['ID_POST'] ?>">Editez</a>
    
</main>

<?php
echo $footer;