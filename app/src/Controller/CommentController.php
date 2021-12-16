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

        $comments = CommentManager::getAllCommentByPostId($postId);
        $post = PostManager::getPostById($postId);

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
            CommentManager::createComment($authorid, $postid, $content, $date);
        }
        else {
            Flash::setFlash('alert', "Please enter some text.");
        }
        header("Location: /article/".$postid);
    }

    public function executeDeleteComment()
    {
        $postid = $_POST['id'];
        $current_user_id = $_SESSION['user_token']['id'];
        $target_comment_id = $_POST['target_comment_id'];
        $target_author_id = $_POST['target_author_id'];

//        Check if the token was not modified
        if (BaseController::checkToken() == true) {
            if ($current_user_id == $target_author_id OR $_SESSION['user_token']['isAdmin'] == 1)
            {
                CommentManager::deleteComment($target_comment_id);
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