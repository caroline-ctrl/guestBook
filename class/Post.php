<?php
class Post
{
    private $id;
    private $name;
    private $content;
    private $created_at;

    public function __construct()
    {
        if (is_int($this->created_at) || is_string($this->created_at)){
            $this->created_at = new DateTime('@' . $this->created_at);
        }
    }

        
    /**
     * getExcerpt: permet de recupèrer un extrait du contenu
     *
     * @return string
     */
    public function getExcerpt(): string
    {
        return substr($this->content, 0, 150);
    }

}