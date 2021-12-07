<?php
session_start();
require './vendor/autoload.php';

$router = new \App\Fram\Router();
$router->getController();
