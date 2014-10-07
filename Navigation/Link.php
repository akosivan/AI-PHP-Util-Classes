<?php
namespace AI\Navigation;

class Link implements LinkInterface{
    protected $id;
    protected $content;
    protected $target;

    function __construct($id, $content, $target) {
        $this->id = $id;
        $this->content = $content;
        $this->target = $target;
    }

    public function getId() {
        return $this->id;
    }

    public function getContent() {
        return $this->content;
    }

    public function getTarget() {
        return $this->target;
    }

}