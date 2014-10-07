<?php
namespace AI\Navigation;

class ImageLink extends Link {

    function __construct($id, $imagePath, $caption, $target) {
        parent::__construct(
                $id,
                $this->createImageMarkup($imagePath, $caption)
                    .$this->createCaptionMarkup($caption),
                $target);
    }

    private function createCaptionMarkup($captionText) {
        return '<span class="caption"><p>'.$captionText.'</p></span>';
    }

    private function createImageMarkup($imagePath, $altText) {
        return '<img src="/'.$imagePath.'" alt="'.$altText.'" />';
    }

}
