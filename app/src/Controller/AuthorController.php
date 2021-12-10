<?php

namespace App\Controller;

use App\Entity\Author;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Manager\AuthorManager;

class AuthorController extends BaseController
{
    /**
     * Show all Authors
     */
    public function executeAuthor()
    {
        $authorManager = new AuthorManager(PDOFactory::getMysqlConnection());
        $authors = $authorManager->getAllAuthor();

        $this->render(
            'author.php',
            [
                'authors' => $authors
            ],
            'Auteur'
        );
    }

    public function executeDeleteUser()
    {
        $current_user_id = $_SESSION['user_token']['id'];
        $target_user_id = $_POST['target_user_id'];

        $authorManager = new AuthorManager(PDOFactory::getMysqlConnection());
        $token = $_SESSION['user_token'];
        $db_token = $authorManager->tokenVerification($_SESSION['user_token']['id'], $_SESSION['user_token']['username'], $_SESSION['user_token']['isAdmin'], $_SESSION['user_token']['email']);
//        Check if the token was not modified
        if ($token == $db_token) {
//            Flash::setFlash('alert', "You played fair.");
            if ($_SESSION['user_token']['isAdmin'] == 0)
            {
            Flash::setFlash('alert', "You have no power here.");
            }
            else {
                if ($current_user_id == $target_user_id)
                {
                    Flash::setFlash('alert', "You can't sucide.");
                }
                else {
                    $connexion = new AuthorManager(PDOFactory::getMysqlConnection());
                    $connexion->deleteAuthorById($target_user_id);
                    Flash::setFlash('alert', "Delete Successful.");
                }
            }
        }
        else {
            Flash::setFlash('alert', "Leave that token alone.");
        }


        header('Location: /author');
    }

    public function executeModifyUserAdmin()
    {;
        $target_user_id = $_POST['target_user_id'];

        $authorManager = new AuthorManager(PDOFactory::getMysqlConnection());
        $token = $_SESSION['user_token'];
        $db_token = $authorManager->tokenVerification($_SESSION['user_token']['id'], $_SESSION['user_token']['username'], $_SESSION['user_token']['isAdmin'], $_SESSION['user_token']['email']);
//        Check if the token was not modified
        if ($token == $db_token) {
//            Flash::setFlash('alert', "You played fair.");
            if ($_SESSION['user_token']['id'] = $target_user_id)
            {
                Flash::setFlash('alert', "You can't change it yourself, ask god perhaps.");
            }
            else  {
                if ($_SESSION['user_token']['isAdmin'] == 0)
                {
                    Flash::setFlash('alert', "You have no power here.");
                }
                else {
                    $connexion = new AuthorManager(PDOFactory::getMysqlConnection());
                    if ($_POST['target_user_situation'] == 1)
                    {
                        $connexion->updateAuthoridAdmin($target_user_id, 0);
                    }
                    else
                    {
                        $connexion->updateAuthoridAdmin($target_user_id, 1);
                    }
                    Flash::setFlash('alert', "Update Successful.");
                }
            }
        }
        else {
            Flash::setFlash('alert', "Leave that token alone.");
        }
        header('Location: /author');
    }

    public function executeSetting()
    {
        $this->render(
            'Setting.php',
            [],
            'Login'
        );
    }

    public function executeModifyUser()
    {
        {
            $id = $_SESSION['user_token']['id'];
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $password = $_POST['password'];
            $verification_password = htmlspecialchars($_POST['verification_password']);

            $hashpassword = password_hash ( $password , PASSWORD_DEFAULT);

            if (isset($username) && isset($email) && $username != NULL && $email != NULL){
                if ($password == $verification_password) {
                    $connexion = new AuthorManager(PDOFactory::getMysqlConnection());
                    $connexion->updateAuthor($id, $username, $email);
                    $_SESSION['user_token'] = $connexion->constructToken($email, $password);
                    Flash::setFlash('alert', "Update Successful.");
                    if ($password != null) {
                        $connexion = new AuthorManager(PDOFactory::getMysqlConnection());
                        $connexion->updateAuthorPassword($id, $hashpassword);
                        Flash::setFlash('alert', "Update Successful.");
                        header('Location: /');
                    }
                    else {
                        header('Location: /');
                    }
                }
                else {
                    Flash::setFlash('alert', "Password are  not identical.");
                    header('Location: /setting');
                }
            }
            else {
                Flash::setFlash('alert', "You didn't enter all the information.");
                header('Location: /setting');
            }
        } 
    }

}