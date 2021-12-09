<?php

namespace App\Manager;

use App\Entity\Author;
use App\Fram\Factories\PDOFactory;

class AuthorManager extends BaseManager
{
  
    //GET ALL AUTHOR
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

    //GET AUTHOR BY ID
    public function getAuthorById(int $id): Author
    {
        $requeteSql = "SELECT * FROM author WHERE id = :id";
        $connexion = new PDOFactory();
        $comment = $connexion->request($requeteSql);
        $comment->bindValue(':id', $id, \PDO::PARAM_INT);
        $comment->execute();
        return $comment;
    }

    //CREATE AUTHOR
    public function createAuthor($username, $isAdmin, $password, $email)
    {
        $requeteSql = "INSERT INTO author (username, isAdmin, password, email) Values (:username, :isAdmin, :password, :email)";
        $connexion = new PDOFactory();
        $insert = $connexion->getMysqlConnection()->prepare($requeteSql);
        $insert->execute(array(
            'username' => $username,
            'isAdmin' => $isAdmin,
            'password' => $password,
            'email' => $email
        ));
        return true;
    }

    public function deleteAuthorById(int $id): bool
    {
        $requeteSql = "DELETE FROM author WHERE id = :id";
        $connexion = new PDOFactory();
        $comment = $connexion->request($requeteSql);
        $comment->bindValue(':id', $id, \PDO::PARAM_INT);
        $comment->execute();
        return true;
    }

    //VERIFY IF USER EXIST
    public function userLogin($email, $password)
    {
        $requeteSql = "SELECT * FROM author WHERE email = :email AND password = :password";
        $connexion = new PDOFactory();
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->bindvalue(':email', $email, \PDO::PARAM_STR);
        $prepare->bindvalue(':password', $password, \PDO::PARAM_STR);
        $prepare->execute();
        return $prepare->fetch();
    }

    //IS MAIL UNIQUE

    //CONSTRUCT TOKEN
    public function constructToken($email)
    {
        $requeteSql = "SELECT username, isAdmin, email FROM author WHERE email = :email";
        $connexion = new PDOFactory();
        $results = $connexion->getMysqlConnection()->prepare($requeteSql);
        $results->execute(
            array(
                'email' => $email
            )
        );
        return  $results->fetch(\PDO::FETCH_ASSOC);
    }

    //VERIFY TOKEN
}