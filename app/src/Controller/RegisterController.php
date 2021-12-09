<?php

namespace App\Controller;

use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Manager\AuthorManager;

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

    public function executeSendRegister(){
        $username = $_POST['username'];
        $isAdmin = $_POST['isAdmin'];
        $password = $_POST['password'];
        $verif_password = $_POST['verif_password'];
        $email = $_POST['email'];
    

//        TODO - Empecher création multiple compte similaire

        if(!empty($username) && !empty($password) && !empty($verif_password) && !empty($email)){
            if($password !== $verif_password){
                header('Location: /register');
            }else{
                $connexion = new AuthorManager(PDOFactory::getMysqlConnection());
                $connexion->createAuthor($username, $isAdmin, $password, $email);
                $_SESSION['user_token'] = $connexion->constructToken($email, $password);
//                }
                header('Location: /');
            }

        }else{
            header('Location: /register');
        }
    }
}