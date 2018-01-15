<?php
class Autoloader{

    /**
     * Enregistre notre autoloader
     */
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function includeControllers()
    {
        foreach (glob("controller/*.php") as $filename)
        {
            include $filename;
        }
    }

    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    static function autoload($class){
        require 'model/' . $class . '.php';
    }

}