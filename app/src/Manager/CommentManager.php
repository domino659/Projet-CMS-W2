<?php

namespace App\Manager;

use App\Entity\Comment;
use App\Fram\Factories\PDOFactory;

class CommentManager extends BaseManager
{
    public static function getAllCommentByPostId(int $id): array
    {
        $requeteSql = "SELECT * FROM comment WHERE postId = :id";
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

    public static function createComment($authorid, $postid, $content, $commentdate){
        $requeteSql = "INSERT INTO comment (authorId, postId, content, commentDate) Values (:authorId, :postId, :content, :commentDate)";
        $connexion = new PDOFactory();

        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->bindValue(':authorId', $authorid, \PDO::PARAM_INT);
        $prepare->bindValue(':postId', $postid, \PDO::PARAM_STR);
        $prepare->bindValue(':content', $content, \PDO::PARAM_STR);
        $prepare->bindValue(':commentDate', $commentdate, \PDO::PARAM_STR);
        $prepare->execute();
        return true;
    }

    public static function deleteComment($id)
    {
        $requeteSql = "DELETE FROM comment WHERE id = :id";
        $connexion = new PDOFactory();
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->bindValue(':id', $id, \PDO::PARAM_INT);
        $prepare->execute();
        return true;
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
}