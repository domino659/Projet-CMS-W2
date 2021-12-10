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
        $current_user_id = $_POST['current_user_id'];
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
}