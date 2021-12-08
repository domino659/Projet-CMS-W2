<?php

namespace App\Entity;

class User
{
    private int $id;
    private str $Username;
    private boolean $isAdmin;
    private str $Password;
    private str $mail;

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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return str
     */
    public function getUsername(): str
    {
        return $this->Username;
    }

    /**
     * @param str $Username
     */
    public function setUsername(str $Username): void
    {
        $this->Username = $Username;
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->isAdmin;
    }

    /**
     * @param bool $isAdmin
     */
    public function setIsAdmin(bool $isAdmin): void
    {
        $this->isAdmin = $isAdmin;
    }

    /**
     * @return str
     */
    public function getPassword(): str
    {
        return $this->Password;
    }

    /**
     * @param str $Password
     */
    public function setPassword(str $Password): void
    {
        $this->Password = $Password;
    }

    /**
     * @return str
     */
    public function getMail(): str
    {
        return $this->mail;
    }

    /**
     * @param str $mail
     */
    public function setMail(str $mail): void
    {
        $this->mail = $mail;
    }
}