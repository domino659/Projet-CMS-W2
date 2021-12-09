<?php

namespace App\Controller;

use App\Manager\AuthorManager;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;

class RegisterController extends BaseController
{
    public function executeRegister()
    {
        $this->render(
            'Register.php',
            [],
            'Register'
        );
    }

    public function executeSendRegister()
    {
        $username = $_POST['username'];
        $isAdmin = $_POST['isAdmin'];
        $password = $_POST['password'];
        $verif_password = $_POST['verif_password'];
        $email = $_POST['email'];

        if ( isset($username) && isset($password) && isset($verif_password) && isset($email)
            && $username != NULL && $password != NULL && $verif_password != NULL && $email != NULL)
        {
            if ( $password == $verif_password )
            {
                $connexion = new AuthorManager(PDOFactory::getMysqlConnection());
                if ( $connexion->isUserUnique($email) == null )
                {
                    $connexion->createAuthor($username, $isAdmin, $password, $email);
                    $_SESSION['user_token'] = $connexion->constructToken($email, $password);
                    header('Location: /');
                    exit;
                }
                else {
                    Flash::setFlash('alert', "Email already exist.");
                    header('Location: /register');
                    exit;
                }
            }
            else {
                Flash::setFlash('alert', "Password are  not identical.");
                header('Location: /register');
                exit;
            }
        }
        else {
            Flash::setFlash('alert', "You didn't enter all the information.");
            header('Location: /register');
            exit;
        }
    }
}