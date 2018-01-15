<?php
class AuthController
{
    public function register()
    {
        if( !isset($_SESSION["user"]) ) {
            global $twig;
            $vars['session'] = $_SESSION;
            echo $twig->render('auth/register.php', $vars);
        }
        else{
            App::redirect("/");
        }
    }

    public function postRegister()
    {
        if ( Auth::register($_POST) !== true )
        {
            global $twig;
            $_SESSION["error"] = Auth::register($_POST);
            $vars['session'] = $_SESSION;
            echo $twig->render('auth/register.php', $vars);
        }
        else
        {
            $_SESSION["success"] = "You are registred.";
            App::redirect("/login");
        }
    }

    public function login()
    {
        if( !isset($_SESSION["user"]) ) {
            global $twig;
            $vars['session'] = $_SESSION;
            echo $twig->render('auth/login.php', $vars);
        }
        else{
            App::redirect("/");
        }
    }

    public function postLogin()
    {
        if (is_array(Auth::login($_POST)))
        {
        $_SESSION['user'] = Auth::login($_POST);
        $_SESSION["success"] = "You are logged.";
        App::redirect("/");
        }
        elseif ( Auth::login($_POST) !== true )
        {
            global $twig;
            $_SESSION["error"] = Auth::login($_POST);
            $vars['session'] = $_SESSION;
            echo $twig->render('auth/login.php', $vars);
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        setcookie("remember_me", "delete", 1);
        App::redirect("/login");
    }

    public function notFound()
    {
        global $twig;
        echo $twig->render('404.php');
    }
}

?>