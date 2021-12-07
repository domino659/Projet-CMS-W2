<?php
spl_autoload_register(function ($className) {
    require $className . '.php';
});

class Commentaire
{
    private Long $CommentID;
    private Long $ArticleID;
    private Long $AuthorID;
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

    public function getCommentID(){
        return $this->CommentID;
    }
    public function setCommentID(Long $ID){
        $this->CommentID = $ID;
        return $this
    }

    public function getAuthorID(){
        return $this->AuthorID;
    }
    public function setAuthorID(Long $ID){
        $this->AuthorID = $ID;
        return $this
    }

    public function getArticleID(){
        return $this->ArticleID;
    }
    public function setArticleID(Long $ID){
        $this->ArticleID = $ID;
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
        return $this->PostDate;
    }
    public function setPostDate(DateTime $PostDate)){
        $this->PostDate = $PostDate;
        return $this
    }
}
