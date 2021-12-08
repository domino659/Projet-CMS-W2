<?php

namespace App\Manager;

use App\Entity\Comment;

class CommentManager extends BaseManager
{
    public function getAllComment(): array
    {
        $AllComment = [];
        $requeteSql = "SELECT * FROM comment";
        $connexion = new PDOFactory();
        $result = $connexion -> request($requestSql);
        foreach ($result as $comment){
            array_push($AllComment, new Comment($post));
        };
        return $AllComment;
    }

    public function getCommentById(){
        $requeteSql = "SELECT * FROM comment WHERE id = $id";
        $connexion = new PDOFactory();
        return $connexion->request($requeteSql);
    }

    public function createComment(){
        $requeteSql = "INSERT INTO comment (id, authorid, postid, content, postdate) Values (:id, :authorid, :postid, :content, :postdate)";
        $connexion = new PDOFactory();
        $insert = $connexion->dbConnect()->prepare( $requeteSql );
        $insert -> execute(array(
            'id' -> $post['id'],
            'authorid' -> $post['authorid'],
            'postid' -> $post['postid'],
            'content' -> $post['content'],
            'postdate' -> $post['postdate']
        ))
    }

    public function updateComment(Comment $comment)
    {
        $id = $post['id'];
        $content = $comment['content'];
        $requeteSql = "UPDATE comment SET content = $content WHERE id = $id";
        $connexion = new PDOFactory();
        return $connexion->request($requeteSql);
    }

    public function deleteComment()
    {
        $requeteSql = "DELETE FROM comment WHERE id = $id";
        $connexion = new PDOFactory();
        return $connexion->request($requeteSql)
    }


}