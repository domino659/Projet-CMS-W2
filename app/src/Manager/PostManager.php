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
        $sth = $connexion->getMysqlConnection()->prepare($requeteSql);
        $sth->execute();
        $results = $sth->fetchAll(\PDO::FETCH_ASSOC);
        $posts = [];
        foreach ($results as $result) {
            $posts[] = new Post($result);
        }
        return $posts;
    }

    public function getPostById(int $id): Post
    {
        $requeteSql = "SELECT * FROM post WHERE id = $id";
        $connexion = new PDOFactory();
        return $connexion->request($requeteSql);
    }

    /**
     * @param Post $post
     * @return Post|bool
     */

    public function createPost(Post $post)
    {
        $requeteSql = "INSERT INTO post (id, authorid, title, content, postdate) Values (:id, :authorid, :title, :content, :postdate)";
        $connexion = new PDOFactory();
        $insert = $connexion->dbConnect()->prepare( $requeteSql );
        $insert->execute(array(
            'id' -> $post['id'],
            'authorid' -> $post['authorid'],
            'title' -> $post['title'],
            'content' -> $post['Ccontent'],
            'postdate' -> $post['postdate']
        ));
        return true;
    }

    /**
     * @param Post $post
     * @return Post|bool
     */

    public function updatePost(Post $post)
    {
        $id = $post['id'];
        $content = $post['content'];
        $title = $title['title'];
        
        $requeteSql = "UPDATE post SET content = $content, title = $title WHERE id = $id";
        $connexion = new PDOFactory();
        return $connexion->request($requeteSql);
    }


    /**
     * @param int $id
     * @return bool
     */

    public function deletePostById(int $id): bool
    {
        $requeteSql = "DELETE FROM post WHERE id = $id";
        $connexion = new PDOFactory();
        return $connexion->request($requeteSql);
    }
}