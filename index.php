<?php

session_start();

date_default_timezone_set('Europe/London');

require_once './vendor/autoload.php'; // Autoload de composer

$loader = new Twig_Loader_Filesystem('view');
$twig = new Twig_Environment($loader, array(
    'cache' => 'view/cache',
    'auto_reload' => true
));

$function = new Twig_Function('css', function ($file_path) {
    $php_self = $_SERVER['PHP_SELF'];
    $path = substr($php_self, 0, -9);
    $result = "<link href=\"" . $path . $file_path . "\" rel=\"stylesheet\">";
    return $result;
});
$twig->addFunction($function);

$function = new Twig_Function('script', function ($file_path) {
    $php_self = $_SERVER['PHP_SELF'];
    $path = substr($php_self, 0, -9);
    $result = "<script src=\"" . $path . $file_path . "\"></script>";
    return $result;
});
$twig->addFunction($function);

$function = new Twig_Function('href', function ($file_path) {
    $php_self = $_SERVER['PHP_SELF'];
    $path = substr($php_self, 0, -10);
    $result = "href=\"".$path.$file_path."\"";
    return $result;
});
$twig->addFunction($function);

$function = new Twig_Function('link', function ($file_path) {
    $php_self = $_SERVER['PHP_SELF'];
    $path = substr($php_self, 0, -10);
    $result = $path.$file_path;
    return $result;
});
$twig->addFunction($function);

require 'autoloader.php'; // Autoload du projet
Autoloader::register();
Autoloader::includeControllers();

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