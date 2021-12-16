<?php
namespace App\controllers;

use App\Fram\Factories\PDOFactory;
use App\Manager\ConnexionManager;
use App\Manager\PostManager;
use App\Manager\UserManager;

class HomeController extends BaseController{

    public function executeHome()
    {   
        $posts = PostManager::getAllPosts();
        
        $this->render(
            'home.php',
            [
                'posts' => $posts
            ],
            'Home'
        );
    }
}