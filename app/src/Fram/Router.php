<?php

namespace App\Fram;

use App\Controller\ErrorController;

class Router
{
    public function getController()
    {
        $xml = new \DOMDocument();
        $xml->load(__DIR__ . './../Config/routes.xml');
        $routes = $xml->getElementsByTagName('route');

        isset($_GET['p']) ? $path = strtolower(htmlspecialchars($_GET['p'])) : $path = '/';

        foreach ($routes as $route) {
            if ($path === $route->getAttribute('path')) {
                $controllerClass = 'App\\Controller\\' . $route->getAttribute('controller');
                $action = $route->getAttribute('action');
                $params = [];
                if ($route->hasAttribute('params')) {
                    $paramsArray = explode(',', $route->getAttribute('params'));
                    foreach ($paramsArray as $param) {
                        $params[$param] = $_GET[$param];
                    }
                }
                return new $controllerClass($action, $params);
            }


        }

        return new ErrorController('error404');


    }
}