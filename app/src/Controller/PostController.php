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

    public function executeEditPost()
    {
        $postid = $_POST['target_post_id'];
        $postManager = new PostManager(PDOFactory::getMysqlConnection());
        $post = $postManager->getPostById($postid);

        $this->render(
            'editpost.php',
            [
                'post' => $post
            ],
            'Edit Post'
        );
    }

    public function executeCreatePost()
    {
        $authorid = $_SESSION['user_token']['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $date = date('Y-m-d H:i:s');

        if(!empty($title) && !empty($content))
        {
            $connexion = new PostManager(PDOFactory::getMysqlConnection());
            $connexion->createPost($authorid, $title, $content, $date);
            header('Location: /');
        }
        else 
        {
            Flash::setFlash('alert', "Please fill title and content.");
            header('Location: /post');
        }
    }

    public function executeDeletePost()
    {
        $current_user_id = $_SESSION['user_token']['id'];
        $target_author_id = $_POST['target_author_id'];

        $authorManager = new AuthorManager(PDOFactory::getMysqlConnection());
        $token = $_SESSION['user_token'];
        $db_token = $authorManager->tokenVerification($_SESSION['user_token']['id'], $_SESSION['user_token']['username'], $_SESSION['user_token']['isAdmin'], $_SESSION['user_token']['email']);
//        Check if the token was not modified
        if ($token == $db_token) {
//            Flash::setFlash('alert', "You played fair.");
            if ($current_user_id == $target_author_id OR $_SESSION['user_token']['isAdmin'] == 1)
            {
                $connexion = new PostManager(PDOFactory::getMysqlConnection());
                $connexion->deletePostById($target_author_id);
                Flash::setFlash('alert', "Delete Successful.");
            }
            else {
                Flash::setFlash('alert', "This is not your post you can't delete it.");
            }
        }
        else {
            Flash::setFlash('alert', "Leave that token alone.");
        }
        header('Location: /');
    }

    public function executeEditPostConfirm()
    {
        $current_user_id = $_SESSION['user_token']['id'];
        $target_author_id = $_POST['target_author_id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $postid = $_POST['postid'];

        $authorManager = new AuthorManager(PDOFactory::getMysqlConnection());
        $token = $_SESSION['user_token'];
        $db_token = $authorManager->tokenVerification($_SESSION['user_token']['id'], $_SESSION['user_token']['username'], $_SESSION['user_token']['isAdmin'], $_SESSION['user_token']['email']);
        if ($token == $db_token) {
            if ($current_user_id == $target_author_id OR $_SESSION['user_token']['isAdmin'] == 1)
            {
                $connexion = new PostManager(PDOFactory::getMysqlConnection());
                $connexion->updatePost($postid, $title, $content);
                Flash::setFlash('alert', "Edit Successful.");
            }
            else {
                Flash::setFlash('alert', "This is not your post you can't edit it");
            }
        }
        header('Location: /');
    }
}
