<?php require base_path('views/includes/base.layout.php') ?>

<?php require base_path('views/includes/banner.php') ?>

<main>
<h2 class="text-capitalize p-3">Ajouter un Post</h2>
<div class="row justify-content-center">
    <div class="col-6 text-center"></div>
</div>
<form method="POST" ACTION="/post" class="w-50 m-auto bg-light p-3 text-capitalize" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="id" value="<?= $post['ID_POST'] ?>">
    <div class="mb-3 row">
        <label
                for="titre"
                class="col-sm-2 col-form-label"
        >Description</label>

        <div class="col-sm-10">
            <textarea
                    id="titre"
                    name="titre"
                    class="form-control" cols="30" rows="10"
                    placeholder="Tapez votre Titre ici..."
            ><?= $post['TITRE'] ?></textarea>

            <?php if (isset($errors['titre'])) : ?>
                <p><?= $errors['titre'] ?></p>
            <?php endif; ?>
        </div>
    </div>
<div>
    <a href="/forum"
       class="btn btn-primary d-block btn-sm" value="Annuler">Annuler</a>


    <button type="submit" class="btn btn-primary d-block btn-sm" name="save" value="Update">Update</button>
</div>
</form>
</div>

</main>

<?php
echo $footer;