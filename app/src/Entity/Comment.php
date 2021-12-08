<?php

namespace App\Entity;

class Comment
{
    private int $id;
    private int $PostId;
    private int $AuthorId;
    private string $Content;
    private DateTime $CommentDate;

    public function __construct(array $data = []){
       $this->hydrate($data);
    }

    public function hydrate($data){
        foreach($data as $key => $value){

            $method = 'set' . ucfirst(key);

            if(is_callable([$this, $method])){
                $this->method($value);
            }
    }

    public function getid(){
        return $this->id;
    }
    public function setCommentId(Long $id){
        $this->id = $id;
        return $this
    }

    public function getAuthorID(){
        return $this->AuthorId;
    }
    public function setAuthorID(int $id){
        $this->AuthorId = $id;
        return $this
    }

    public function getPostID(){
        return $this->PostID;
    }
    public function setPostID(int $id){
        $this->PostId = $id;
        return $this
    }

    public function getContent(){
        return $this->Content;
    }
    public function setContent(str $Content)){
        $this->Content = $Content;
        return $this
    }

    public function getCommentDate(){
        return $this->CommentDate;
    }
    public function setCommentDate(DateTime $CommentDate)){
        $this->CommentDate = $CommentDate;
        return $this
    }
}
