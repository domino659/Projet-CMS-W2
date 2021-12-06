<?php
spl_autoload_register(function ($className) {
    require $className . '.php';
});

class User
{
    private Long $UserID;
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

    public function getUserID(){
        return $this->UserID;
    }
    public function setUserID(Long $ID){
        $this->UserID = $ID;
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