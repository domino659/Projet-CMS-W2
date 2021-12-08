<?php

namespace App\Entity;

class Author
{
    private int $id;
    private string $username;
    private bool $isAdmin;
    private string $password;
    private string $mail;

    public function __construct(array $data = []){
       $this->hydrate($data);
    }

    public function hydrate($data){
        foreach($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (is_callable([$this, $method])) {
                $this->method($value);
            }
        }
    }
}