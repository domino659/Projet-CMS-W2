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
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->execute();
        $result = $prepare->fetchAll(\PDO::FETCH_ASSOC);
        $authors = [];
        foreach ($result as $author) {
            $authors[] = new Author($author);
        }
        return $authors;
    }

    //GET AUTHOR BY ID
    public function getAuthorById(int $id): Author
    {
        $requeteSql = "SELECT * FROM author WHERE id = :id";
        $connexion = new PDOFactory();
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->bindValue(':id', $id, \PDO::PARAM_INT);
        $prepare->execute();
        return $prepare;
    }

    /**
     * @param Post $post
     * @return Post|bool
     */

    public function createAuthor($username, $isAdmin, $password, $email)
    {
        $requeteSql = "INSERT INTO author (username, isAdmin, password, email) Values (:username, :isAdmin, :password, :email)";
        $connexion = new PDOFactory();
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->bindValue(':username', $username, \PDO::PARAM_STR);
        $prepare->bindValue(':isAdmin', $isAdmin, \PDO::PARAM_BOOL);
        $prepare->bindValue(':password', $password, \PDO::PARAM_STR);
        $prepare->bindValue(':email', $email, \PDO::PARAM_STR);
        $prepare->execute();
        return true;
    }

    /**
     * @param int $id
     * @return bool
     */

    public function deleteAuthorById(int $id): bool
    {
        $requeteSql = "DELETE FROM author WHERE id = :id";
        $connexion = new PDOFactory();
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->bindValue(':id', $id, \PDO::PARAM_INT);
        $prepare->execute();
        return true;
    }

    //VERIFY IF USER EXIST
    public function userLogin($email)
    {
        $requeteSql = "SELECT password FROM author WHERE email = :email";
        $connexion = new PDOFactory();
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->bindvalue(':email', $email, \PDO::PARAM_STR);
        $prepare->execute();
        return $prepare->fetch();
    }

    //VERIFY IS USER UNIQUE
    public function isUserUnique($email)
    {
        $requeteSql = "SELECT email FROM author WHERE email = :email";
        $connexion = new PDOFactory();
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->bindvalue(':email', $email, \PDO::PARAM_STR);
        $prepare->execute();
        return $prepare->fetch();;
    }

    //CONSTRUCT TOKEN
    public function constructToken($email)
    {
        $requeteSql = "SELECT id, username, isAdmin, email FROM author WHERE email = :email";
        $connexion = new PDOFactory();
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->bindvalue(':email', $email, \PDO::PARAM_STR);
        $prepare->execute();
        return  $prepare->fetch(\PDO::FETCH_ASSOC);
    }

    //VERIFY TOKEN
    public function tokenVerification($id, $username, $isAdmin, $email)
    {
        $requeteSql = "SELECT id, username, isAdmin, email FROM author WHERE id = :id AND username = :username AND isAdmin = :isAdmin AND email = :email";
        $connexion = new PDOFactory();
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->bindvalue(':id', $id, \PDO::PARAM_INT);
        $prepare->bindvalue(':username', $username, \PDO::PARAM_STR);
        $prepare->bindvalue(':isAdmin', $isAdmin, \PDO::PARAM_BOOL);
        $prepare->bindvalue(':email', $email, \PDO::PARAM_STR);
        $prepare->execute();
        return $prepare->fetch(\PDO::FETCH_ASSOC);
    }
}