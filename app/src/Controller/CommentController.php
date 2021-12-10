<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Post;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Manager\CommentManager;
use App\Manager\PostManager;

class CommentController extends BaseController
{
    public function executeComment()
    {
        $postId = $_GET['id'];
        $commentManager = new CommentManager(PDOFactory::getMysqlConnection());
        $comments = $commentManager->getAllCommentByPostId($postId);
        $postManager = new PostManager(PDOFactory::getMysqlConnection());
        $post = $postManager->getPostById($postId);

        $this->render(
            'article.php',
            [
                'post' => $post,
                'comments' => $comments,
            ],
            'Comment'
        );
    }

    public function executeCreateComment()
    {
        $date = date('Y-m-d H:i:s');
        $content = $_POST['content'];
        $postid = $_GET['id'];
        $authorid = 1;

        if(!empty($content))
        {
            $connexion = new CommentManager(PDOFactory::getMysqlConnection());
            $connexion->createComment($authorid, $postid, $content, $date);
            header('Location: /');
        }
    }
}