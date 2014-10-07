<?php
namespace AI\Article;

interface ArticleInterface {
    public function getAuthor();
    public function getPublishDate();
    public function getTitle();
    public function getIntro();
    public function getBody();
    public function getAttachedMaterials();
}
