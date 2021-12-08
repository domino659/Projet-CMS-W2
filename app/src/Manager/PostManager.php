<?php

namespace App\Manager;

use App\Entity\Post;

class PostManager extends BaseManager
{


    /**
     * @return Post[]
     */
    public function getAllPosts(): array
    {
        // TODO -  Get all posts
        return [];
    }

    public function getPostById(int $id): Post
    {
        // TODO - Posts by Id
    }

    /**
     * @param Post $post
     * @return Post|bool
     */
    public function createPost(Post $post)
    {
        // TODO - create post
        return true;
    }

    /**
     * @param Post $post
     * @return Post|bool
     */
    public function updatePost(Post $post)
    {
        // TODO - getPostById($post->getId())
    }

    /**
     * @param int $id
     * @return bool
     */
    public function deletePostById(int $id): bool
    {
        // TODO - Delete post
    }
}

// <?php

// namespace App\Manager;

// use App\Entity\Post;

// class PostManager extends BaseManager
// {

//     /**
//      * @return Post[]
//      */

//     public function getAllPost(): array
//     {
//         $AllPost = [];
//         $requeteSql = "SELECT * FROM post";
//         $connexion = new PDOFactory();
//         $result = $connexion -> request($requeteSql);
//         foreach ($result as $post){
//             array_push($AllPost, new Post($post));
//         };

//         return $AllPost;
//     }

//     public function getPostById(int $id): Post
//     {
//         $requeteSql = "SELECT * FROM post WHERE id = $id";
//         $connexion = new PDOFactory();
//         return $connexion->request($requeteSql);
//     }

//     /**
//      * @param Post $Post
//      * @return Post|bool
//      */

//     public function createPost(Post $post)
//     {
//         $requeteSql = "INSERT INTO post (id, authorid, title, content, postdate) Values (:id, :authorid, :title, :content, :postdate)";
//         $connexion = new PDOFactory();
//         $insert = $connexion->dbConnect()->prepare( $requeteSql );
//         $insert->execute(array(
//             'id' -> $post['id'],
//             'authorid' -> $post['authorid'],
//             'title' -> $post['title'],
//             'content' -> $post['Ccontent'],
//             'postdate' -> $post['postdate']
//         ));
//         return true;
//     }

//     /**
//      * @param Post $Post
//      * @return Post|bool
//      */

//     public function updatePost(Post $post)
//     {
//         $id = $post['id'];
//         $content = $post['content'];
//         $title = $title['title'];
        
//         $requeteSql = "UPDATE post SET content = $content, title = $title WHERE id = $id";
//         $connexion = new PDOFactory();
//         return $connexion->request($requeteSql);
//     }

//     /**
//      * @param int $id
//      * @return bool
//      */

//     public function deletePostById(int $id): bool
//     {
//         $requeteSql = "DELETE FROM post WHERE id = $id";
//         $connexion = new PDOFactory();
//         return $connexion->request($requeteSql);
//     }
// }