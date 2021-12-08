<?php

namespace App\Entity;

class Post
{
    private int $id;
    private string $title;
    private string $content;
    private \DateTime $postDate;
    private int $authorId;

    public function hydrate($data){
        foreach($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (is_callable([$this, $method])) {
                $this->$method($value);
            }
        }
    }
}