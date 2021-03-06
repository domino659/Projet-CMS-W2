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
        $posts = PostManager::getAllPosts();

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
        $post = PostManager::getPostById($postid);

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
        $postImageName = NULL;
        $authorid = $_SESSION['user_token']['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $date = date('Y-m-d H:i:s');
        $postImage = $_FILES['image']['name'];

        if (isset($postImage) && $postImage != NULL) {
            $tmpFile = $_FILES['image']['tmp_name'];
            $newFile = 'public/images/'.$_FILES['image']['name'];
            $result = move_uploaded_file($tmpFile, $newFile);
            if ($result) {
                $postImageName = $_FILES['image']['name'];
                Flash::setFlash('alert', "Image uploaded.");
            } else {
                Flash::setFlash('alert', "Image Failed to upload.");
            }
        }
        if(!empty($title) && !empty($content))
        {
            PostManager::createPost($authorid, $title, $content, $date, $postImageName);
            Flash::setFlash('alert', "You're post was uploaded.");
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
        $target_post_id = $_POST['target_post_id'];

//        Check if the token was not modified
        if (BaseController::checkToken() == true) {
//            Flash::setFlash('alert', "You played fair.");
            if ($current_user_id == $target_author_id OR $_SESSION['user_token']['isAdmin'] == 1)
            {
                PostManager::deletePostById($target_post_id);
                Flash::setFlash('alert', "<Delete Successful.>");
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

//        Check if the token was not modified
        if (BaseController::checkToken() == true) {
//            Flash::setFlash('alert', "You played fair
            if ($current_user_id == $target_author_id OR $_SESSION['user_token']['isAdmin'] == 1)
            {
                PostManager::updatePost($postid, $title, $content);
                Flash::setFlash('alert', "Edit Successful.");
            }
            else {
                Flash::setFlash('alert', "This is not your post you can't edit it");
            }
        }
        header("Location: /article/".$postid);
    }
}
