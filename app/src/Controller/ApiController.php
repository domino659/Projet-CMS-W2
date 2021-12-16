<?php

namespace App\Controller;

use App\Manager\AuthorManager;
use App\Manager\PostManager;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;

class ApiController extends BaseController
{
    public function executeApi()
    {
        $this->render(
            'Api.php',
            [],
            'Api'
        );
    }

    public function executeGetUserApi()
    {
        $authorsList = AuthorManager::getAllAuthor();
        $authors = [];
        foreach($authorsList as $author){
            $authors[] = (array) $author;
        }
        echo(json_encode($authors));
    }

    public function executeGetPostApi()
    {
        $postManager = new PostManager(PDOFactory::getMysqlConnection());
        $postsList = $postManager->getAllPosts();
        $posts = [];
        foreach($postsList as $post){
            $posts[] = (array) $post;
        }
        echo(json_encode($posts));
    }
}