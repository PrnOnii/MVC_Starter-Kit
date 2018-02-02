<?php

function models($class) {
    if(file_exists('model/' . $class . '.php'))
    {
        require_once 'model/' . $class . '.php';
    }
}

function controllers($class) {
    if(file_exists('controller/' . $class . '.php'))
        require_once 'controller/' . $class . '.php';
}

spl_autoload_register('controllers');
spl_autoload_register('models');
