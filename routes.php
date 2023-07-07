<?php

/**
 * Fichier de définition des routes de l'application.
 * @var \Core\Router $router Instance du routeur de l'application.
 */
$router->get('/', 'index.php');
$router->get('/pricing', 'pricing.php');

// Routes Forum.
$router->get('/forum', 'forum/index.php');
$router->get('/post', 'forum/show.php');
$router->delete('/post', 'forum/destroy.php');

$router->get('/post/edit', 'forum/edit.php');
$router->patch('/post', 'forum/update.php');

$router->get('/forum/create', 'forum/create.php');
$router->post('/forum', 'forum/store.php');

// Routes Blog.
$router->get('/blog', 'blog/index.php');

$router->get('/blog/create', 'blog/create.php');
$router->post('/blog', 'blog/store.php');

// Routes liens footer.
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');
$router->get('/terms_&_conditions', 'terms_&_conditions.php');
$router->get('/privacy_policy', 'privacy_policy.php');

// Routes Inscription.
$router->get('/register', 'inscription/create.php');
$router->post('/register', 'inscription/store.php');

// Routes Login.
$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');

// Routes Tb User.
$router->get('/user', 'user/index.php');
