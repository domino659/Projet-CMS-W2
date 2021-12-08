<?php

namespace App\Fram\Factories;

use PDO;

class PDOFactory
{
    public static function getMysqlConnection()
    {
        $dsn = 'mysql:host=db;dbname=ProjetCMSW2';
        $user = 'root';
        $pwd = 'password';
        try {
             return  new PDO($dsn, $user, $pwd);
         } catch (Exception $e) {
             die('Erreur : ' . $e->getMessage());
         }
    }
}
