<?php

namespace App\Manager;

class AuthorManager extends BaseManager
{
    public function getAllAuthor(): array
    {
        $AllAuthor = [];
        $requestSql = "SELECT * FROM Author";
        $connexion = new PDOFactory();
        $result = $connexion -> request($requeteSql);
        foreach ($result as $comment){
            array_push($AllAuthor, new Author($Author));
        }
        return $AllAuthor;
    }

    public function getAuthorById(int $id): Author
    {
        $requeteSql = "SELECT * FROM Author WHERE id = $id";
        $connexion = new PDOFactory();
        return $connexion->request($requeteSql);
    }

    public function createAuthor(Author $Author)
    {
        $requeteSql = "INSERT INTO Author (id, Authorname, isadmin, password, mail) Values (:id, :Authorname, :isadmin, :password, :mail)";
        $connexion = new PDOFaxtory();
        $insert = $connexion->dbConnect()->prepare($requeteSql);
        $insert->execute(array(
            'id' -> $post['id'],
            'authorName' -> $post['Authorname'],
            'isAdmin' -> $post['isadmin'],
            'password' -> $post['password'],
            'mail' -> $post['mail']
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