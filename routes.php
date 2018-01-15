<?php
$router = new Router($_GET['url']);

//Authentification
$router->get('/login', "Auth#login");
$router->post('/login', "Auth#postLogin");
$router->get('/register', "Auth#register");
$router->post('/register', "Auth#postRegister");
$router->get('/logout', "Auth#logout");

//404
$router->get('/:whatever', "Auth#notFound");

$router->run();