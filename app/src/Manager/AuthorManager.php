<?php

namespace App\Manager;

use App\Entity\Author;
use App\Fram\Factories\PDOFactory;

class AuthorManager extends BaseManager
{

    /**
     * @return Author[]
     */

    public function getAllAuthor(): array
    {
        $requeteSql = "SELECT * FROM author";
        $connexion = new PDOFactory();
        $sth = $connexion->getMysqlConnection()->prepare($requeteSql);
        $sth->execute();
        $results = $sth->fetchAll(\PDO::FETCH_ASSOC);
        $authors = [];
        foreach ($results as $result) {
            $authors[] = new Author($result);
        }
        return $authors;
    }

    public function getAuthorById(int $id): Author
    {
        $requeteSql = "SELECT * FROM Author WHERE id = $id";
        $connexion = new PDOFactory();
        return $connexion->request($requeteSql);
    }

    public function createAuthor(Author $Author)
    {
        $requeteSql = "INSERT INTO Author (id, Authorname, isadmin, password, email) Values (:id, :Authorname, :isadmin, :password, :email)";
        $connexion = new PDOFaxtory();
        $insert = $connexion->dbConnect()->prepare($requeteSql);
        $insert->execute(array(
            'id' -> $post['id'],
            'authorName' -> $post['Authorname'],
            'isAdmin' -> $post['isadmin'],
            'password' -> $post['password'],
            'email' -> $post['email']
        ));
        return true;
    }

    public function deleteAuthorById(int $id): bool
    {
        $requeteSql = "DELETE FROM Author WHERE id = $id";
        $connexion = new PDOFactory();
        return $connexion->request($requeteSql);
    }
}