<?php

namespace App\Entity;

use App\Fram\Factories\PDOFactory;
use App\Manager\AuthorManager;

class Post
{
    private int $id;
    private string $title;
    private string $content;
    private \DateTime $postDate;
    private int $authorId;
    private string $postImage;

    public function __construct(array $data){
        $this->hydrate($data);
    }

    public function hydrate($data){
        foreach($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (is_callable([$this, $method])) {
                $this->$method($value);
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
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return \DateTime
     */
    public function getPostDate(): \DateTime
    {
        return $this->postDate;
    }

    /**
     * @param \DateTime $postDate
     */
    public function setPostDate(string $datetime): void
    {
        $this->postDate = new \DateTime($datetime);
    }

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    /**
     * @param int $authorId
     */
    public function setAuthorId(int $authorId): void
    {
        $this->authorId = $authorId;
    }

    /**
     * @return string
     */
    public function getPostImage(): string
    {
        return $this->postImage;
    }

    /**
     * @param int $authorId
     */
    public function setPostImage(string $postImage): void
    {
        $this->postImage = $postImage;
    }

    public function getAuthor($id)
    {
        return AuthorManager::getAuthorById($id);
    }
}