<?php

namespace App\Controller;

use App\Manager\AuthorManager;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;

class LoginController extends BaseController
{

    public function executeSendLogin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ( isset($email) && isset($password) && $email != NULL && $password != NULL){
            $connexion = new AuthorManager(PDOFactory::getMysqlConnection());
            if ($connexion->userLogin($email, $password)) {
                $_SESSION['user_token'] = $connexion->constructToken($email, $password);
                header('Location: /');
            } else {
                Flash::setFlash('alert', "The mail or the password you’ve entered is incorrect");
                header('Location: /login');
            }
        } else {
            Flash::setFlash('alert', "You didn't enter all the information.");
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