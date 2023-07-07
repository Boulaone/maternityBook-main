<?php

/**
 * Enregistre un nouvel utilisateur et le connecte si les informations d'inscription sont valides.
 *
 * Ce script récupère les informations d'inscription envoyées via POST, valide ces informations,
 * et si elles sont valides et que l'email n'est pas déjà utilisé, un nouvel utilisateur est créé
 * dans la base de données. L'utilisateur est alors connecté et redirigé vers le tableau de bord.
 * Si les informations d'inscription ne sont pas valides ou que l'email est déjà utilisé,
 * une vue d'erreur est renvoyée.
 *
 * @package Apps\Router\controllers\inscription
 * @uses Core\App
 * @uses Core\Database
 * @uses Core\Validator
 */

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;
use Core\Authenticator;

/**
 * @var Database $pdo Instance de la base de données.
 */
$pdo = App::resolve(Database::class);

/**
 * @var string $nom Nom saisi par l'utilisateur lors de l'inscription.
 * @var string $prenom Prenom saisi par l'utilisateur lors de l'inscription.
 * @var string $email Email saisi par l'utilisateur lors de l'inscription.
 * @var string $password Mot de passe saisi par l'utilisateur lors de l'inscription.
 * @var string $password_confirm Mot de passe de confirmation saisi par l'utilisateur lors de l'inscription.
 * @var array $errors Erreurs de validation du formulaire.
 */
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

$errors = [];

// Vérifier le jeton CSRF
if ($_POST['csrf_token'] !== Session::get('csrf_token')) {
    // Le jeton CSRF est invalide, donc arrête le traitement et renvoie une erreur.
}


// Validation des entrées du formulaire
if (!Validator::email($email)) {
    $errors['email'] = 'Veuillez fournir un email valide';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Veuillez fournir un mot de passe valid de minimum 7 caractères';
}

// Validation de la correspondance des mots de passe
if ($password !== $password_confirm) {
    $errors['password_confirm'] = 'Les mots de passe ne correspondent pas';
}

if (!empty($errors)) {
    // Transmettez $errors à la vue
    return view('inscription/create', ['errors' => $errors]); // A modifier
}

// Vérification si le compte existe déjà
/**
 * @var array $user Utilisateur récupéré de la base de données.
 */

// Récupère le nouvel utilisateur
$user = $pdo->query('select * from user where email = :email', [
    'email' => $email
])->find();

if ($user) {
    // Si un utilisateur avec cet email existe déjà, ajouter une erreur et rediriger vers la page d'inscription.
    $_SESSION['errors']['email'] = 'Cette adresse e-mail est déjà utilisée';
    // Recharger la page courante
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit();
} else {
    // Insertion du nouvel utilisateur
    $pdo->query('INSERT INTO user(nom, prenom, email, password) VALUES(:nom, :prenom, :email, :password)', [
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

// Récupération du nouvel utilisateur
    $user = $pdo->query('SELECT * FROM user WHERE email = :email', [
        'email' => $email
    ])->find();

    $authenticator = new Authenticator();
    $authenticator->login($user);

    // Définir les variables de session
    $_SESSION['login'] = true;
    $_SESSION['user'] = $user;

    header('Location: /'); // Redirige vers le tableau de bord utilisateur si abonné
    exit();
}
