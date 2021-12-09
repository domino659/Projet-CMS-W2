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
                //'user' => new Author(),
                'test' => 'je suis un test'
            ],
            'Home page'
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
}
