<?php

namespace App\Entity;

class User
{
    private Long $id;
    private str $Username;
    private boolean $isAdmin;
    private str $Password;
    private str $mail;

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
    public function setid(Long $id){
        $this->id = $id;
        return $this
    }

    public function getUsername(){
        return $this->Username;
    }
    public function setUsername(str $Username)){
        $this->Username = $Username;
        return $this
    }

    public function getisAdmin(){
        return $this->isAdmin;
    }
    public function setisAdmin(boolean $isAdmin)){
        $this->isAdmin = $isAdmin;
        return $this
    }

    public function getMail(){
        return $this->Mail;
    }
    public function setUsername(str $Mail)){
        $this->Mail = $Mail;
        return $this
    }

    public function getPassword(){
        return $this->Password;
    }
    public function setUsername(str $Password)){
        $this->Password = $Password;
        return $this
    }
}