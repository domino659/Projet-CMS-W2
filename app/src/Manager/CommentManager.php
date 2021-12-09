<?php

namespace App\Manager;

use App\Entity\Comment;
use App\Fram\Factories\PDOFactory;

class CommentManager extends BaseManager
{
    public function getAllComment(): array
    {
        $requeteSql = "SELECT * FROM comment";
        $connexion = new PDOFactory();
        $prep = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prep->execute();
        $results = $prep->fetchAll(\PDO::FETCH_ASSOC);
        $posts = [];
        foreach ($results as $result) {
            $comments[] = new Comment($result);
        }
        return $comments;
    }

    public function getAllCommentByPostId(int $id): array
    {
        $requeteSql = "SELECT * FROM comment WHERE authorId = :id";
        $connexion = new PDOFactory();
        $prep = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);
        $prep->execute();
        $results = $prep->fetchAll(\PDO::FETCH_ASSOC);
        $posts = [];
        foreach ($results as $result) {
            $comments[] = new Comment($result);
        }
        return $comments;
    }

    public function getCommentById(){
        $requeteSql = "SELECT * FROM comment WHERE id = $id";
        $connexion = new PDOFactory();
        return $connexion->request($requeteSql);
    }

    // public function createComment(){
    //     $requeteSql = "INSERT INTO comment (id, authorid, postid, content, postdate) Values (:id, :authorid, :postid, :content, :postdate)";
    //     $connexion = new PDOFactory();
    //     $insert = $connexion->dbConnect()->prepare($requeteSql);
    //     $insert -> execute(array(
    //         'id' -> $post['id'],
    //         'authorid' -> $post['authorid'],
    //         'postid' -> $post['postid'],
    //         'content' -> $post['content'],
    //         'postdate' -> $post['postdate']
    //     ));
    // }

    // public function updateComment(Comment $comment)
    // {
    //     $id = $post['id'];
    //     $content = $comment['content'];
    //     $requeteSql = "UPDATE comment SET :content WHERE :id";
    //     $requeteSql->bindValue(':content', $_GET['content'], PDO::PARAM_STR);
    //     $requeteSql->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    //     $requetSql->execute;
    //     $connexion = new PDOFactory();
    //     return $connexion->request($requeteSql);
    // }

    // public function deleteComment()
    // {
    //     $requeteSql = "DELETE FROM comment WHERE id = $id";
    //     $connexion = new PDOFactory();
    //     return $connexion->request($requeteSql);
    // }
}