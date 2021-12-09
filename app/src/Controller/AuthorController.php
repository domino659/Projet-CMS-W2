<?php

namespace App\Controller;

use App\Entity\Author;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Manager\AuthorManager;

class AuthorController extends BaseController
{
    /**
     * Show all Authors
     */
    public function executeAuthor()
    {
        $authorManager = new AuthorManager(PDOFactory::getMysqlConnection());
        $authors = $authorManager->getAllAuthor();

        $this->render(
            'author.php',
            [
                'authors' => $authors
            ],
            'Auteur'
        );
    }
}