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
    public function getPostId(): int
    {
        return $this->PostId;
    }

    /**
     * @param int $PostId
     */
    public function setPostId(int $PostId): void
    {
        $this->PostId = $PostId;
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
    public function getCommentDate(): DateTime
    {
        return $this->CommentDate;
    }

    /**
     * @param DateTime $CommentDate
     */
    public function setCommentDate(DateTime $CommentDate): void
    {
        $this->CommentDate = $CommentDate;
    }
}
