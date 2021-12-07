<?php
spl_autoload_register(function ($className) {
    require $className . '.php';
});

class Article
{
    private Long $ArticleID;
    private Long $AuthorID;
    private string $Title;
    private string $Content;
    private DateTime $PostDate;

    public function __construct(string $Titre, array $data = []){
       $this->setTitle($Titre);
       $this->hydrate($data);
    }

    public function hydrate($data){
        foreach($data as $key => $value){

            $method = 'set' . ucfirst(key);

            if(is_callable([$this, $method])){
                $this->method($value);
            }
    }

    public function getArticleID(){
        return $this->ArticleID;
    }
    public function setArticleID(Long $ID){
        $this->ArticleID = $ID;
        return $this
    }

    public function getAuthorID(){
        return $this->AuthorID;
    }
    public function setAuthorID(Long $ID){
        $this->AuthorID = $ID;
        return $this
    }

    public function getTitle(){
        return $this->Title;
    }
    public function setTitle(str $Title){
        $this->Title = $Title;
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
        return $this->Content;
    }
    public function setPostDate(DateTime $PostDate)){
        $this->PostDate = $PostDate;
        return $this
    }
}

