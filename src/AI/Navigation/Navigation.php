<?php

namespace AI\Navigation;

use Exception;

class Navigation implements NavigationInterface
{
    const ROOT_LINK_ID = "root";

    private $navigationTree;

    function __construct() {
        $this->navigationTree = array();
        $rootLink = new Link(
                self::ROOT_LINK_ID,
                NULL,
                NULL
                );
        $this->navigationTree[self::ROOT_LINK_ID] = array(
            "parents" => array(),
            "link" => $rootLink,
            "children" => array(),
        );
    }

    public function getLink($id) {
        $linkElement = $this->getLinkElement($id);
        return $linkElement["link"];
    }

    public function addChild(LinkInterface $parentLink, LinkInterface $childLink) {
        $this->navigationTree[$childLink->getId()] = array(
            "parents" => array($parentLink->getId()),
            "link" => $childLink,
            "children" => array(),
        );
        $parentsChildren = $this->navigationTree[$parentLink->getId()]["children"];
        if (!in_array($childLink->getId(), $parentsChildren)) {
            $this->navigationTree[$parentLink->getId()]["children"][] = $childLink->getId();
        }

    }

    public function addChildren(LinkInterface $parentLink, \Traversable $childrenLinks) {
        foreach ($childrenLinks as $child) {
            $this->addChild($parentLink, $child);
        }
    }

    public function getChildren(LinkInterface $link) {
        return $this->getRelatives($link, "children");
    }

    public function getParents(LinkInterface $link) {
        return $this->getRelatives($link, "parents");
    }

    public function getRootLink() {
        return $this->navigationTree[self::ROOT_LINK_ID]["link"];
    }

    public function getTopLinks() {
        return $this->getChildren($this->getRootLink());
    }

    private function getLinkElement($id) {
        return $this->navigationTree[$id];
    }

    private function getRelatives(LinkInterface $link, $relativeName) {
        $relatives = array();
        $relativesIds = $this->navigationTree[$link->getId()][$relativeName];
        foreach ($relativesIds as $id) {
            $relatives[] = $this->getLink($id);
        }
        return $relatives;

    }

    public function getLinkChainFromRoot(LinkInterface $link) {
        $linkChain = array();
        /** @var $rootLink LinkInterface */
        $rootLink = $this->getRootLink();
        $curLink = $link;

        while ($curLink->getId() !== $rootLink->getId()) {
            array_unshift($linkChain, $curLink);
            $parentLinks = $this->getParents($curLink);
            if (count($parentLinks) > 0) {
                $curLink = $parentLinks[0];
            }
            else {
                throw new Exception('Parent does not exists for link.');
            }
        }

        return $linkChain;
    }

    public function getLinksWithTarget($target) {
        $linksWithTarget = array();

        foreach ($this->navigationTree as $linkElement) {
            /** @var $link LinkInterface */
            $link = $linkElement["link"];
            if ($link->getTarget() == $target) {
                $linksWithTarget[] = $link;
            }
        }

        return $linksWithTarget;
    }

}