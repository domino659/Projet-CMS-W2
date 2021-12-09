<?php
namespace App\controllers;

use App\Fram\Factories\PDOFactory;
use App\Manager\ConnexionManager;
use App\Manager\PostManager;
use App\Manager\UserManager;

class HomeController extends BaseController{

    public function executeHome()
    {   
        $postManager = new PostManager(PDOFactory::getMysqlConnection());
        $posts = $postManager->getAllPosts();

        $userManager = new UserManager(PDOFactory::getMysqlConnection());

        $this->render(
            'home.php',
            [
                'posts' => $posts
            ],
            'Home'
        );
    }
}