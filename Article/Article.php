<?php
namespace AI\Article;

class Article implements ArticleInterface {
    private $author;
    private $publishDate;
    private $title;
    private $intro;
    private $body;
    private $attachedMaterials = array();

    public function getAuthor() {
        return $this->author;
    }

    public function getBody() {
        return $this->body;
    }

    public function getIntro() {
        return $this->intro;
    }

    public function getPublishDate() {
        return $this->publishDate;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAttachedMaterials() {
        return $this->attachedMaterials;
    }

}
