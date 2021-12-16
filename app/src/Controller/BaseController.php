<?php

namespace App\Controller;

use App\Manager\AuthorManager;

abstract class BaseController
{
    private $templateFile = __DIR__ . './../Views/template.php';
    private $viewsDir = __DIR__ . './../Views/Frontend/';
    protected $params;

    public function __construct(string $action, array $params = [])
    {
        $this->params = $params;

        $method = 'execute' . ucfirst($action);
        if (is_callable([$this, $method])) {
            $this->$method();
        }
    }

    public function render(string $template, array $arguments, string $title)
    {
        $view = $this->viewsDir . $template;

        foreach ($arguments as $key => $value) {
            ${$key} = $value;
        }


        ob_start();
        require $view;
        $content = ob_get_clean();
        require $this->templateFile;
        exit;
    }

    public static function checkToken() {
        $token = $_SESSION['user_token'];
        $db_token = AuthorManager::tokenVerification($_SESSION['user_token']['id'], $_SESSION['user_token']['username'], $_SESSION['user_token']['isAdmin'], $_SESSION['user_token']['email']);
        if ($token == $db_token) {
            return true;
        }
        else {
            return false;
        }
    }
}