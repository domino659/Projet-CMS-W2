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
        $authorManager = new AuthorManager(PDOFactory::getMysqlConnection());
        $authors = $authorManager->getAllAuthor();
        echo(json_encode($authors));
    }

    public function executeGetPostApi()
    {
        $postManager = new PostManager(PDOFactory::getMysqlConnection());
        $posts = $postManager->getAllPosts();
        echo(json_encode($posts, JSON_FORCE_OBJECT));
    }
}