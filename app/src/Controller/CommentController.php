<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Post;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Manager\CommentManager;
use App\Manager\PostManager;
use App\Manager\AuthorManager;

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
        $authorid = $_SESSION['user_token']['id'];
        $date = date('Y-m-d\TH:i:s');
        $content = $_POST['content'];
        $postid = $_POST['id'];

        if(!empty($content))
        {
            $connexion = new CommentManager(PDOFactory::getMysqlConnection());
            $connexion->createComment($authorid, $postid, $content, $date);
            header("Location: /article/".$postid);
        }
    }

    public function executeDeleteComment()
    {
        $postid = $_POST['id'];
        $current_user_id = $_SESSION['user_token']['id'];
        $target_comment_id = $_POST['target_comment_id'];
        $target_author_id = $_POST['target_author_id'];

        $authorManager = new AuthorManager(PDOFactory::getMysqlConnection());
        $token = $_SESSION['user_token'];
        $db_token = $authorManager->tokenVerification($_SESSION['user_token']['id'], $_SESSION['user_token']['username'], $_SESSION['user_token']['isAdmin'], $_SESSION['user_token']['email']);
        if ($token == $db_token) {
            if ($current_user_id == $target_author_id OR $_SESSION['user_token']['isAdmin'] == 1)
            {
                $connexion = new CommentManager(PDOFactory::getMysqlConnection());
                $connexion->deleteComment($target_comment_id);
                Flash::setFlash('alert', "Delete Successful.");
            }
            else {
                Flash::setFlash('alert', "This is not your comment you can't delete it.");
            }
        }
        else {
            Flash::setFlash('alert', "Leave that token alone.");
        }
        header("Location: /article/".$postid);
    }
}