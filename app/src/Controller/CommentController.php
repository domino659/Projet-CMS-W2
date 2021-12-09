<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Post;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Manager\CommentManager;

class CommentController extends BaseController
{
    public function executeComment()
    {
        $postId = $_GET['id'];
        $commentManager = new CommentManager(PDOFactory::getMysqlConnection());
        $comments = $commentManager->getAllCommentByPostId($postId);

        $this->render(
            'article.php',
            [
                'comments' => $comments,
                //'user' => new Author(),
                'test' => 'je suis un test'
            ],
            'comment page'
        );
    }
}