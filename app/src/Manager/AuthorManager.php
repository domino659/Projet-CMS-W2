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
        $requeteSql = "SELECT * FROM author WHERE id = $id";
        $connexion = new PDOFactory();
        return $connexion->request($requeteSql);
    }

//    VERIFY IF USER EXIST
    public function userExist($email, $mdp)
    {
        $requeteSql = "SELECT * FROM author WHERE email = ? and password = ?";
        $connexion = $this->pdo->prepare($requeteSql);
        $connexion->execute(array($email, $mdp));
        return $connexion->fetch();
    }

//    CONSTRUCT TOKEN
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

//    CREATE AUTHOR
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
        $requeteSql = "DELETE FROM author WHERE id = $id";
        $connexion = new PDOFactory();
        return $connexion->request($requeteSql);
    }
}