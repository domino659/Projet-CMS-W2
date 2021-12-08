<?php

namespace App\Manager;

class UserManager extends BaseManager
{
    public function getAllUser(): array
    {
        $AllUser = [];
        $requestSql = "SELECT * FROM user";
        $connexion = new PDOFactory();
        $result = $connexion -> request($requeteSql);
        foreach ($result as $comment){
            array_push($AllUser, new User($user));
        }
        return $AllUser;
    }

    public function getUserById(int $id): User
    {
        $requeteSql = "SELECT * FROM user WHERE id = $id";
        $connexion = new PDOFactory();
        return $connexion->request($requeteSql);
    }

    public function createUser(User $user)
    {
        $requeteSql = "INSERT INTO user (id, username, isadmin, password, mail) Values (:id, :username, :isadmin, :password, :mail)";
        $connexion = new PDOFaxtory();
        $insert = $connexion->dbConnect()->prepare($requeteSql);
        $insert->execute(array(
            'id' -> $post['id'],
            'username' -> $post['username'],
            'isadmin' -> $post['isadmin'],
            'password' -> $post['password'],
            'mail' -> $post['mail']
        ));
        return true;
    }

    public function deleteUserById(int $id): bool
    {
        $requeteSql = "DELETE FROM user WHERE id = $id";
        $connexion = new PDOFactory();
        return $connexion->request($requeteSql);
    }
}