<?php
class Controller
{
    protected $vars = [];
    public function view($view)
    {
        global $twig;
        $this->vars['view'] = $view;
        $this->vars['session'] = $_SESSION;
        echo $twig->render('layout.php', $this->vars);
    }
}