<?php

namespace App\Controller;

use App\Manager\AuthorManager;
use App\Fram\Factories\PDOFactory;

class LoginController extends BaseController
{
    public function executeSendLogin()
    {
            if ( isset($_POST['email']) && isset($_POST['password']) ){
                $email = $_POST['email'];
                $password = $_POST['password'];
                $connexion = new AuthorManager(PDOFactory::getMysqlConnection());
                if ($connexion->userExist($email, $password)) {
                    $_SESSION['user_token'] = $connexion->constructToken($email, $password);
                    header('Location: /');
                } else {
//                    TODO - Information incorrecte
                    header('Location: /login');
                }
            } else {
//                TODO - Manque mail ou mdp
                header('Location: /login');
            }
        }

    public function executeLogout()
    {
        unset($_SESSION['user_token']);
        header('Location: /');
    }
        public function executeLogin()
    {
        $this->render(
            'Login.php',
            [],
            'Login'
        );
    }
}