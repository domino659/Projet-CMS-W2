<?php

namespace App\Entity;

class Comment
{
    private int $id;
    private string $content;
    private \DateTime $commentDate;
    private int $authorId;
    private int $postId;

    public function hydrate($data){
        foreach($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (is_callable([$this, $method])) {
                $this->$method($value);
            }
        }
    }
}