<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="public/assets/css/layout/parameter_layout.css">
    <title>Maternity Book</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/16f50d8c2f.js" crossorigin="anonymous"></script>
    <!-- ajout des icones tb_user -->

</head>
<body>

<?php include 'templates/header.php'; ?>

<form class="row g-3">
    <div class="col-md-6">
        <label for="inputPseudo" class="form-label">Pseudo actuel</label>
        <input type="text" class="form-control" id="inputPseudo">
    </div>
    <div class="col-md-6">
        <label for="inputPseudo" class="form-label">Nouveau pseudo</label>
        <input type="text" class="form-control" id="inputPseudo">
    </div>
    <div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="inputPassword4">
        </div>
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Nouveau mot de passse</label>
        <input type="password" class="form-control" id="inputPassword4">
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Confirmez mot de passse</label>
        <input type="password" class="form-control" id="inputPassword4">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Validez</button>
    </div>
</form>

<?php include 'templates/footer.php'; ?>

</body>
</html>

