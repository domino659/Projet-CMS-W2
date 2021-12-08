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
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->AuthorId;
    }

    /**
     * @param int $AuthorId
     */
    public function setAuthorId(int $AuthorId): void
    {
        $this->AuthorId = $AuthorId;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->Title;
    }

    /**
     * @param string $Title
     */
    public function setTitle(string $Title): void
    {
        $this->Title = $Title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->Content;
    }

    /**
     * @param string $Content
     */
    public function setContent(string $Content): void
    {
        $this->Content = $Content;
    }

    /**
     * @return DateTime
     */
    public function getPostDate(): DateTime
    {
        return $this->PostDate;
    }

    /**
     * @param DateTime $PostDate
     */
    public function setPostDate(DateTime $PostDate): void
    {
        $this->PostDate = $PostDate;
    }
}

