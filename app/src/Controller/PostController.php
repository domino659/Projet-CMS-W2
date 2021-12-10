<?php

namespace App\Controller;

use App\Entity\Author;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Manager\PostManager;
use App\Manager\AuthorManager;

class PostController extends BaseController
{
    /**
     * Show all Posts
     */
    public function executeIndex()
    {
        $postManager = new PostManager(PDOFactory::getMysqlConnection());
        $posts = $postManager->getAllPosts();

        $this->render(
            'home.php',
            [
                'posts' => $posts,
            ],
            'Post'
        );
    }

    public function executePost()
    {
        $this->render(
            'post.php',
            [],
            'Post'
        );
    }

    public function executeCreatePost()
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $userid = 1;
        $date = date('Y-m-d H:i:s');

        if(!empty($title) && !empty($content))
        {
            $connexion = new PostManager(PDOFactory::getMysqlConnection());
            $connexion->createPost($userid, $title, $content, $date);
            header('Location: /');
        }
    }

    public function executeDeletePost()
    {
        $current_user_id = $_SESSION['user_token']['id'];
        $target_post_id = $_POST['target_user_id'];

        $authorManager = new AuthorManager(PDOFactory::getMysqlConnection());
        $token = $_SESSION['user_token'];
        $db_token = $authorManager->tokenVerification($_SESSION['user_token']['id'], $_SESSION['user_token']['username'], $_SESSION['user_token']['isAdmin'], $_SESSION['user_token']['email']);
//        Check if the token was not modified
        if ($token == $db_token) {
//            Flash::setFlash('alert', "You played fair.");
            if ($current_user_id == $target_post_id OR $_SESSION['user_token'][isAdmin] == 1)
            {
                $connexion = new PostManager(PDOFactory::getMysqlConnection());
                $connexion->deletePostById($target_post_id);
                Flash::setFlash('alert', "Delete Successful.");
            }
            else {
                Flash::setFlash('alert', "This is not your post you can't delete it.");
            }
        }
        else {
            Flash::setFlash('alert', "Leave that token alone.");
        }
        header('Location: /author');
    }
}
