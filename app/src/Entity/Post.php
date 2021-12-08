<?php

namespace App\Entity;

class Post
{
    private int $id;
    private int $AuthorId;
    private string $Title;
    private string $Content;
    private DateTime $PostDate;

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

    public function getPostId(){
        return $this->id;
    }
    public function setPostId(Long $id){
        $this->id = $id;
        return $this
    }

    public function getAuthorId(){
        return $this->AuthorId;
    }
    public function setAuthorId(int $id){
        $this->AuthorId = $id;
        return $this
    }

    public function getTitle(){
        return $this->Title;
    }
    public function setTitle(str $Title){
        $this->Title = $Title;
        return $this
    }

    public function getContent(){
        return $this->Content;
    }
    public function setContent(str $Content)){
        $this->Content = $Content;
        return $this
    }

    public function getPostDate(){
        return $this->Content;
    }
    public function setPostDate(DateTime $PostDate)){
        $this->PostDate = $PostDate;
        return $this
    }
}

