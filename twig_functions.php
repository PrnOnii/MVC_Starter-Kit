<?php
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