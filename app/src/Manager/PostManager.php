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
        $prep = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prep->execute();
        $results = $prep->fetchAll(\PDO::FETCH_ASSOC);
        $posts = [];
        foreach ($results as $result) {
            $posts[] = new Post($result);
        }
        return $posts;
    }

    public function getPostById(int $id): Post
    {
        $requeteSql = "SELECT * FROM post WHERE id = :id";
        $connexion = new PDOFactory();
        $comment = $connexion->getMysqlConnection()->prepare($requeteSql);
        $comment->bindValue(':id', $id, \PDO::PARAM_INT);
        $comment->execute();
        return $comment;
    }

    /**
     * @param Post $post
     * @return Post|bool
     */

    public function createPost($authorid, $title, $content, $date)
    {
        $requeteSql = "INSERT INTO post (authorid, title, content, postdate) Values (:authorid, :title, :content, :postdate)";
        $connexion = new PDOFactory();
        $insert = $connexion->getMysqlConnection()->prepare($requeteSql);
        $insert->bindValue(':authorid', $authorid, \PDO::PARAM_INT);
        $insert->bindValue(':title', $title, \PDO::PARAM_STR);
        $insert->bindValue(':content', $content, \PDO::PARAM_STR);
        $insert->bindValue(':postdate', $date, \PDO::PARAM_STR);
        $insert->execute();
        return true;
    }
    /**
     * @param Post $post
     * @return Post|bool
     */

    public function updatePost(Post $post)
    {
        $requeteSql = "UPDATE post SET content = :content, title = :title WHERE id = :id";
        $connexion = new PDOFactory();
        $comment = $connexion->getMysqlConnection()->prepare($requeteSql);
        $comment->bindValue(':id', $post['id'], \PDO::PARAM_INT);
        $comment->bindValue(':content', $post['content'], \PDO::PARAM_STR);
        $comment->bindValue(':title', $post['post'], \PDO::PARAM_STR);
        $comment->execute();
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
        $comment = $connexion->getMysqlConnection()->prepare($requeteSql);
        $comment->bindValue(':id', $id, \PDO::PARAM_INT);
        $comment->execute();
        return true;
    }
}