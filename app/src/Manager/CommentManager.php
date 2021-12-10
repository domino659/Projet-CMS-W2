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
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->execute();
        $results = $prepare->fetchAll(\PDO::FETCH_ASSOC);
        $comments = [];
        foreach ($results as $comment) {
            $comments[] = new Comment($comment);
        }
        return $comments;
    }

    public function getAllCommentByPostId(int $id): array
    {
        $requeteSql = "SELECT * FROM comment WHERE authorId = :id";
        $connexion = new PDOFactory();
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->bindValue(':id', $id, \PDO::PARAM_INT);
        $prepare->execute();
        $results = $prepare->fetchAll(\PDO::FETCH_ASSOC);
        $comments = [];
        foreach ($results as $comment) {
            $comments[] = new Comment($comment);
        }
        return $comments;
    }

    public function getCommentById(){
        $requeteSql = "SELECT * FROM comment WHERE id = :id";
        $connexion = new PDOFactory();
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->bindValue(':id', $id, \PDO::PARAM_INT);
        $prepare->execute();
        return $prepare;
    }

    public function createComment($authorid, $postid, $content, $commentdate){
        $requeteSql = "INSERT INTO comment (authorid, postid, content, commentdate) Values (:authorid, :postid, :content, :commentdate)";
        $connexion = new PDOFactory();
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->bindValue(':authorid', $authorid, \PDO::PARAM_INT);
        $prepare->bindValue(':postid', $postid, \PDO::PARAM_STR);
        $prepare->bindValue(':content', $content, \PDO::PARAM_STR);
        $prepare->bindValue(':commentdate', $commentdate, \PDO::PARAM_STR);
        $prepare->execute();
        $prepare->execute;
    }

    // public function updateComment(Comment $comment)
    // {
    //     $id = $post['id'];
    //     $content = $comment['content'];
    //     $requeteSql = "UPDATE comment SET :content WHERE :id";
    //     $connexion = new PDOFactory();
    //     $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
    //     $prepare->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    //     $prepare->execute;
    //     $prepare->execute;
    // }

    // public function deleteComment($id)
    // {
    //     $requeteSql = "DELETE FROM comment WHERE id = $id";
    //     $connexion = new PDOFactory();
    //     $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
    //     $prepare->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    //     $prepare->execute;
    //     $prepare->execute;
    // }
}