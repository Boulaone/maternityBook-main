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
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" class="form-control" id="inputEmail4">
    </div>
    <div class="col-md-2">
        <label for="inputState" class="form-label">Cvilité</label>
        <select class="form-select" aria-label="Default select example">
            <option selected>Mme</option>
            <option value="1">Mr</option>
        </select>
    </div>
    <div>
        <div class="row">
            <div class="col">
                <label for="Firstname">Prénom</label>
                <input type="text" class="form-control" placeholder="First name" aria-label="First name">
            </div>
            <div class="col">
                <label for="Lastname">Nom</label>
                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
            </div>
        </div>
    </div>
    <div class="col-12">
        <label for="inputAddresse" class="form-label">Addresse</label>
        <input type="text" class="form-control" id="inputAddress">
    </div>
    <div class="col-12">
        <label for="inputAddress2" class="form-label">Complément adresse</label>
        <input type="text" class="form-control" id="inputAddress2">
    </div>
    <div class="col-md-6">
        <label for="inputCity" class="form-label">Ville</label>
        <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="col-md-2">
        <label for="inputZip" class="form-label">Code Postal</label>
        <input type="text" class="form-control" id="inputZip">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Je valide les changements</button>
    </div>
</form>

<?php include 'templates/footer.php'; ?>

</body>
</html>
