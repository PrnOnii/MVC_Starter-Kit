<?php

session_start();

date_default_timezone_set('Europe/London');

require_once './vendor/autoload.php'; // Autoload de composer
include_once 'autoloader.php'; // Autoload du projet;

$loader = new Twig_Loader_Filesystem('view');
$twig = new Twig_Environment($loader, array(
    'cache' => 'view/cache',
    'auto_reload' => true
));


include "twig_functions.php";
include "routes.php";


//Suppresion des sessions pour les messages
if(isset($_SESSION['success']))
{
    unset($_SESSION['success']);
}
if(isset($_SESSION['error']))
{
    unset($_SESSION['error']);
}
