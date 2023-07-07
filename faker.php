<?php
global $pdo;
require_once 'vendor/autoload.php';
require_once '_cnx/connect.php';

$faker = Faker\Factory::create();

// Générer des données pour la table GROSSESSE
for ($i = 0; $i < 50; $i++) {
    $abonnement = $faker->randomElement(['classic', 'Premium']);
    $premiereGrossesse = $faker->boolean;
    $dateAccouchement = $faker->date();
    $dateConception = $faker->date();
    $dureeMoyCycle = $faker->numberBetween(20, 40);
    $dateRegles = $faker->date();
    $choixMaternite = $faker->word();
    $arrivMaternite = $faker->dateTime()->format('Y-m-d H:i:s');
    $departMaternite = $faker->dateTime()->format('Y-m-d H:i:s');
    $peridurale = $faker->boolean;
    $perteEaux = $faker->word();
    $typeAccouchement = $faker->word();
    $livre = $faker->sentence();
    $partageCompte = $faker->boolean;

    $sql = "INSERT INTO GROSSESSE (ABONNEMENT, PREMIERE_GROSSESSE, DATE_ACCOUCHEMENT, DATE_CONCEPTION, DUREE_MOY_CYCLE, DATE_REGLES, CHOIX_MATERNITE, ARRIV_MATERNITE, DEPART_MATERNITE, PERIDURALE, PERTE_EAUX, TYPE_ACCOUCHEMENT, LIVRE, PARTAGE_COMPTE)
            VALUES ('$abonnement', $premiereGrossesse, '$dateAccouchement', '$dateConception', $dureeMoyCycle, '$dateRegles', '$choixMaternite', '$arrivMaternite', '$departMaternite', $peridurale, '$perteEaux', '$typeAccouchement', '$livre', $partageCompte)";

    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        $error = "Erreur lors de l'insertion dans la table GROSSESSE : " . $e->getMessage();
        // Gérer l'erreur selon vos besoins
    }
}

// Générer des données pour la table USER
for ($i = 0; $i < 50; $i++) {
    $role = $faker->randomElement(['admin', 'gratuit', 'abonne_p', 'abonne_sec']);
    $pseudo = $faker->userName();
    $password = $faker->password();
    $email = $faker->email();
    $prenom = $faker->firstName();
    $nom = $faker->lastName();

    $sql = "INSERT INTO USER (ROLE, PSEUDO, PASSWORD, EMAIL, PRENOM, NOM)
            VALUES ('$role', '$pseudo', '$password', '$email', '$prenom', '$nom')";

    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        $error = "Erreur lors de l'insertion dans la table USER : " . $e->getMessage();
        // Gérer l'erreur selon vos besoins
    }
}

// Générer des données pour la table PARENT
for ($i = 0; $i < 50; $i++) {
    $lienParente = $faker->randomElement(['Maman', 'Papa', 'Frere', 'Soeur']);
    $enceinte = $faker->boolean;
    $poidsNais = $faker->randomFloat(2, 2, 5);
    $tailleNais = $faker->randomFloat(2, 45, 55);
    $groupeSang = $faker->randomElement(['A+', 'B+', 'O+', 'AB+', 'A-', 'B-', 'O-', 'AB-']);
    $photoBebe = $faker->imageUrl();
    $photoActuel = $faker->imageUrl();
    $dateNais = $faker->dateTime()->format('Y-m-d H:i:s');;
    $departementNais = $faker->stateAbbr();
    $idGrossesse = $faker->numberBetween(1, 10);

    $sql = "INSERT INTO PARENT (LIEN_PARENTE, ENCEINTE, POIDS_NAIS, TAILLE_NAIS, GROUPE_SANG, PHOTO_BEBE, PHOTO_ACTUEL, DATE_NAIS, DEPARTEMENT_NAIS, ID_GROSSESSE)
            VALUES ('$lienParente', $enceinte, $poidsNais, $tailleNais, '$groupeSang', '$photoBebe', '$photoActuel', '$dateNais', '$departementNais', $idGrossesse)";

    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        $error = "Erreur lors de l'insertion dans la table PARENT : " . $e->getMessage();
        // Gérer l'erreur selon vos besoins
    }
}

// Générer des données pour la table AVATAR
for ($i = 0; $i < 50; $i++) {
    $corpulence = $faker->randomElement(['mince', 'moyen', 'fort']);
    $coulPeau = $faker->randomElement(['blanc', 'noir', 'brun']);
    $coulYeux = $faker->randomElement(['bleu', 'marron', 'vert']);
    $coulCheveux = $faker->randomElement(['blond', 'brun', 'roux']);
    $typeCheveux = $faker->randomElement(['court', 'long']);
    $accessoires = $faker->randomElement(['lunettes', 'chapeau', null]);
    $barbe = $faker->randomElement(['barbe', null]);
    $idParent = $faker->numberBetween(1, 10);

    $sql = "INSERT INTO AVATAR (CORPULENCE, COUL_PEAU, COUL_YEUX, COUL_CHEVEUX, TYPE_CHEVEUX, ACCESSOIRES, BARBE, ID_PARENT)
            VALUES ('$corpulence', '$coulPeau', '$coulYeux', '$coulCheveux', '$typeCheveux', '$accessoires', '$barbe', $idParent)";

    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        $error = "Erreur lors de l'insertion dans la table AVATAR : " . $e->getMessage();
        // Gérer l'erreur selon vos besoins
    }
}

// Générer des données pour la table BEBE
for ($i = 0; $i < 50; $i++) {
    $sexe = $faker->randomElement(['F', 'M']);
    $prenom = $faker->firstName();
    $prenom2 = $faker->firstName();
    $prenom3 = $faker->firstName();
    $poids = $faker->randomFloat(2, 2, 5);
    $taille = $faker->randomFloat(2, 45, 55);
    $dateNais = $faker->dateTime()->format('Y-m-d H:i:s');;
    $idGrossesse = $faker->numberBetween(1, 10);

    $sql = "INSERT INTO BEBE (SEXE, PRENOM, PRENOM_2, PRENOM_3, POIDS, TAILLE, DATE_NAIS, ID_GROSSESSE)
            VALUES ('$sexe', '$prenom', '$prenom2', '$prenom3', $poids, $taille, '$dateNais', $idGrossesse)";

    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        $error = "Erreur lors de l'insertion dans la table BEBE : " . $e->getMessage();
        // Gérer l'erreur selon vos besoins
    }
}

// Générer des données pour la table ARTICLE_BLOG
for ($i = 0; $i < 50; $i++) {
    $titre = $faker->sentence();
    $body = $faker->paragraphs(3, true);
    $auteur = $faker->name();
    $partenaire = $faker->company();

    $sql = "INSERT INTO ARTICLE_BLOG (TITRE, BODY, AUTEUR, PARTENAIRE)
            VALUES ('$titre', '$body', '$auteur', '$partenaire')";

    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        $error = "Erreur lors de l'insertion dans la table ARTICLE_BLOG : " . $e->getMessage();
        // Gérer l'erreur selon vos besoins
    }
}

// Générer des données pour la table CATEG_FORUM
for ($i = 0; $i < 5; $i++) {
    $nom = $faker->word();

    $sql = "INSERT INTO CATEG_FORUM (NOM)
            VALUES ('$nom')";

    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        $error = "Erreur lors de l'insertion dans la table CATEG_FORUM : " . $e->getMessage();
        // Gérer l'erreur selon vos besoins
    }
}

// Générer des données pour la table POST_FORUM
for ($i = 0; $i < 50; $i++) {
    $titre = $faker->sentence();
    $body = $faker->paragraphs(3, true);
    $date = $faker->dateTime()->format('Y-m-d H:i:s');;
    $idUser = $faker->numberBetween(1, 10);
    $idCateg = $faker->numberBetween(1, 5);

    $sql = "INSERT INTO POST_FORUM (TITRE, BODY, DATE, ID_USER, ID_CATEG)
            VALUES ('$titre', '$body', '$date', $idUser, $idCateg)";

    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        $error = "Erreur lors de l'insertion dans la table POST_FORUM : " . $e->getMessage();
        // Gérer l'erreur selon vos besoins
    }
}

// Générer des données pour la table CARTE_CADEAU
for ($i = 0; $i < 50; $i++) {
    $nom = $faker->word();
    $message = $faker->sentence();
    $code = $faker->randomNumber(6);
    $dateValidite = $faker->date();
    $idGrossesse = $faker->numberBetween(1, 10);

    $sql = "INSERT INTO CARTE_CADEAU (NOM, MESSAGE, CODE, DATE_VALIDITE, ID_GROSSESSE)
            VALUES ('$nom', '$message', '$code', '$dateValidite', $idGrossesse)";

    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        $error = "Erreur lors de l'insertion dans la table CARTE_CADEAU : " . $e->getMessage();
        // Gérer l'erreur selon vos besoins
    }
}

// Générer des données pour la table MEDICAL
for ($i = 0; $i < 50; $i++) {
    $type = $faker->word();
    $nom = $faker->company();
    $adresse = $faker->address();
    $cp = $faker->postcode();
    $ville = $faker->city();
    $telephone = $faker->phoneNumber();
    $idGrossesse = $faker->numberBetween(1, 10);

    $sql = "INSERT INTO MEDICAL (TYPE, NOM, ADRESSE, CP, VILLE, TELEPHONE, ID_GROSSESSE)
            VALUES ('$type', '$nom', '$adresse', '$cp', '$ville', '$telephone', $idGrossesse)";

    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        $error = "Erreur lors de l'insertion dans la table MEDICAL : " . $e->getMessage();
        // Gérer l'erreur selon vos besoins
    }
}

// Générer des données pour la table RDV

$currentDate = new DateTime();
for ($i = 0; $i < 50; $i++) {
    $titre = $faker->sentence();
    $body = $faker->sentence();
    $date = $faker->dateTimeBetween($currentDate, '+1 year')->format('Y-m-d H:i:s');
    $idGrossesse = $faker->numberBetween(1, 10);
    $idMedical = $faker->numberBetween(1, 10);

    $sql = "INSERT INTO RDV (TITRE, BODY, DATE, ID_GROSSESSE, ID_MEDICAL)
            VALUES ('$titre', '$body', '$date', $idGrossesse, $idMedical)";

    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        $error = "Erreur lors de l'insertion dans la table RDV : " . $e->getMessage();
        // Gérer l'erreur selon vos besoins
    }
}

// Générer des données pour la table FORMULAIRE
for ($i = 0; $i < 5; $i++) {
    $typeQuestion = $faker->word();
    $intitule = $faker->sentence();
    $pronostic = $faker->boolean;

    $sql = "INSERT INTO FORMULAIRE (TYPE_QUESTION, INTITULE, PRONOSTIC)
            VALUES ('$typeQuestion', '$intitule', $pronostic)";

    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        $error = "Erreur lors de l'insertion dans la table FORMULAIRE : " . $e->getMessage();
        // Gérer l'erreur selon vos besoins
    }
}

// Générer des données pour la table SEMAINE
for ($i = 1; $i <= 40; $i++) {
    $idGrossesse = $faker->numberBetween(1, 10);

    $sql = "INSERT INTO SEMAINE (ID_GROSSESSE, NUM_SEMAINE)
            VALUES ($idGrossesse, $i)";

    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        $error = "Erreur lors de l'insertion dans la table SEMAINE : " . $e->getMessage();
        // Gérer l'erreur selon vos besoins
    }
}

// Générer des données pour la table PHOTO
for ($i = 0; $i < 50; $i++) {
    $lien = $faker->imageUrl();
    $info = $faker->sentence();
    $personne = $faker->name();
    $idGrossesse = $faker->numberBetween(1, 10);
    $numSemaine = $faker->numberBetween(1, 40);

    $sql = "INSERT INTO PHOTO (LIEN, INFO, PERSONNE, ID_GROSSESSE, NUM_SEMAINE)
            VALUES ('$lien', '$info', '$personne', $idGrossesse, $numSemaine)";

    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        $error = "Erreur lors de l'insertion dans la table PHOTO : " . $e->getMessage();
        // Gérer l'erreur selon vos besoins
    }
}

// Générer des données pour la table ADRESSE
for ($i = 0; $i < 50; $i++) {
    $nom = $faker->firstName();
    $prenom = $faker->lastName();
    $adresse = $faker->address();
    $cp = $faker->postcode();
    $ville = $faker->city();
    $idGrossesse = $faker->numberBetween(1, 10);

    $sql = "INSERT INTO ADRESSE (NOM, PRENOM, ADRESSE, CP, VILLE, ID_GROSSESSE)
            VALUES ('$nom', '$prenom', '$adresse', '$cp', '$ville', $idGrossesse)";

    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        $error = "Erreur lors de l'insertion dans la table ADRESSE : " . $e->getMessage();
        // Gérer l'erreur selon vos besoins
    }
}

// Générer des données pour la table REPONSE
for ($i = 0; $i < 50; $i++) {
    $reponse = $faker->sentence();
    $prenom = $faker->firstName();
    $idFormulaire = $faker->numberBetween(1, 5);

    $sql = "INSERT INTO REPONSE (REPONSE, PRENOM, ID_PARENT, ID_FORMULAIRE)
            VALUES ('$reponse', '$prenom', $idParent, $idFormulaire)";

    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        $error = "Erreur lors de l'insertion dans la table REPONSE : " . $e->getMessage();
        // Gérer l'erreur selon vos besoins
    }
}

// Générer des données pour la table MSG_PRIVE
for ($i = 0; $i < 50; $i++) {
    $idExpediteur = $faker->numberBetween(1, 10);
    $idDestinataire = $faker->numberBetween(1, 10);
    $titre = $faker->sentence();
    $body = $faker->sentence();

    $sql = "INSERT INTO MSG_PRIVE (ID_EXPEDITEUR, ID_DESTINATAIRE, TITRE, BODY)
            VALUES ($idExpediteur, $idDestinataire, '$titre', '$body')";

    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        $error = "Erreur lors de l'insertion dans la table MSG_PRIVE : " . $e->getMessage();
        // Gérer l'erreur selon vos besoins
    }
}

// Générer des données pour la table COM_BLOG
for ($i = 0; $i < 50; $i++) {
    $titre = $faker->sentence();
    $body = $faker->sentence();
    $date = $faker->dateTime()->format('Y-m-d H:i:s');;
    $idUser = $faker->numberBetween(1, 10);
    $idArticle = $faker->numberBetween(1, 10);

    $sql = "INSERT INTO COM_BLOG (TITRE, BODY, DATE, ID_USER, ID_ARTICLE)
            VALUES ('$titre', '$body', '$date', $idUser, $idArticle)";

    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        $error = "Erreur lors de l'insertion dans la table COM_BLOG : " . $e->getMessage();
        // Gérer l'erreur selon vos besoins
    }
}

// Générer des données pour la table COM_FORUM
for ($i = 0; $i < 50; $i++) {
    $titre = $faker->sentence();
    $body = $faker->sentence();
    $date = $faker->dateTime()->format('Y-m-d H:i:s');
    $idUser = $faker->numberBetween(1, 10);
    $idPost = $faker->numberBetween(1, 10);

    $sql = "INSERT INTO COM_FORUM (TITRE, BODY, DATE, ID_USER, ID_POST)
            VALUES ('$titre', '$body', '$date', $idUser, $idPost)";

    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        $error = "Erreur lors de l'insertion dans la table COM_FORUM : " . $e->getMessage();
        // Gérer l'erreur selon vos besoins
    }
}

// Générer des données pour la table INVITE
for ($i = 0; $i < 50; $i++) {
    $lien = $faker->url();
    $nom = $faker->name();
    $dateValidite = $faker->date();
    $idGrossesse = $faker->numberBetween(1, 10);

    $sql = "INSERT INTO INVITE (LIEN, NOM, DATE_VALIDITE, ID_GROSSESSE)
            VALUES ('$lien', '$nom', '$dateValidite', $idGrossesse)";

    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        $error = "Erreur lors de l'insertion dans la table INVITE : " . $e->getMessage();
        // Gérer l'erreur selon vos besoins
    }
}