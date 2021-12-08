<?php

namespace App\Controller;

use App\Entity\Author;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Manager\PostManager;

class PostController extends BaseController
{
    /**
     * Show all Posts
     */
    public function executeIndex()
    {
        $PostManager = new PostManager(PDOFactory::getMysqlConnection());
        $Posts = $PostManager->getAllPost();

        $this->render(
            'home.php',
            [
                'Posts' => $Posts,
                'user' => new Author(),
                'test' => 'je suis un test'
            ],
            'Home page'
        );

    }

    public function executeShow()
    {
        Flash::setFlash('alert', 'je suis une alerte');

        $this->render(
            'show.php',
            [
                'test' => 'Post ' . $this->params['id']
            ],
            'Show Page'
        );
    }

    public function executeAuthor()
    {
        $this->render(
            'author.php',
            [],
            'Auteur'
        );
    }
}