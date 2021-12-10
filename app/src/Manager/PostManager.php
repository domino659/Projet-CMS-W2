<?php

namespace App\Manager;

use App\Entity\Post;
use App\Fram\Factories\PDOFactory;

class PostManager extends BaseManager
{

    /**
     * @return Post[]
     */

    public function getAllPosts(): array
    {
        $requeteSql = "SELECT * FROM post";
        $connexion = new PDOFactory();
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->execute();
        $results = $prepare->fetchAll(\PDO::FETCH_ASSOC);
        $posts = [];
        foreach ($results as $post) {
            $posts[] = new Post($post);
        }
        return $posts;
    }

    public function getPostById(int $id): Post
    {
        $requeteSql = "SELECT * FROM post WHERE id = :id";
        $connexion = new PDOFactory();
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->bindValue(':id', $id, \PDO::PARAM_INT);
        $prepare->execute();
        $post = new Post($prepare->fetch(\PDO::FETCH_ASSOC));
        return $post;
    }

    /**
     * @param Post $post
     * @return Post|bool
     */

    public function createPost($authorid, $title, $content, $date)
    {
        $requeteSql = "INSERT INTO post (authorid, title, content, postdate) Values (:authorid, :title, :content, :postdate)";
        $connexion = new PDOFactory();
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->bindValue(':authorid', $authorid, \PDO::PARAM_INT);
        $prepare->bindValue(':title', $title, \PDO::PARAM_STR);
        $prepare->bindValue(':content', $content, \PDO::PARAM_STR);
        $prepare->bindValue(':postdate', $date, \PDO::PARAM_STR);
        $prepare->execute();
        return true;
    }
    /**
     * @param Post $post
     * @return Post|bool
     */

    public function updatePost($id, $title, $content)
    {
        $requeteSql = "UPDATE post SET content = :content, title = :title WHERE id = :id";
        $connexion = new PDOFactory();
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->bindValue(':id', $id, \PDO::PARAM_INT);
        $prepare->bindValue(':content', $content, \PDO::PARAM_STR);
        $prepare->bindValue(':title', $title, \PDO::PARAM_STR);
        $prepare->execute();
        return true;
    }

    /**
     * @param int $id
     * @return bool
     */

    public function deletePostById(int $id): bool
    {
        $requeteSql = "DELETE FROM post WHERE id = :id";
        $connexion = new PDOFactory();
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->bindValue(':id', $id, \PDO::PARAM_INT);
        $prepare->execute();
        return true;
    }
}