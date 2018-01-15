<?php

Class App {
    public static function database()
    {
        $sql = new PDO('mysql:host=127.0.0.1; dbname=my_meetic; charset=utf8', 'root', 'root');
        $sql->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        $sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $sql;
    }

    public static function redirect($url)
    {
        $php_self = $_SERVER['PHP_SELF'];
        $path = substr($php_self, 0, -10);
        header("Location: ".$path.$url);
        die();
    }

    public static function checkAuth($id)
    {
        $query_base = "SELECT *
		FROM users
        WHERE id = :id";
		$bind["id"] = $id;

        $reponse = App::database()->prepare($query_base);
        $reponse->execute($bind);
        $user = $reponse->fetch();
        if(isset($user['id']))
        {
            $_SESSION['user'] = $user;
        }
        else
        {
            self::redirect('/logout');
        }
    }

    public static function link($link){
        $php_self = $_SERVER['PHP_SELF'];
        $path = substr($php_self, 0, -10);
        $result = $path.$link;
        return $result;
    }

    static public function preventSpam()
    {
        if (isset($_SESSION['posttimer']))
        {
            if ( (time() - $_SESSION['posttimer']) <= 5)
            {
                return false;
            }
            else
            {
                $_SESSION['posttimer'] = time();
                return true;
            }
        }
        else
        {
            $_SESSION['posttimer'] = time();
            return true;
        }
    }
}