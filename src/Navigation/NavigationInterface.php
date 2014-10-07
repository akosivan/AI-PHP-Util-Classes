<?php
namespace AI\Navigation;

interface NavigationInterface
{
    function getLink($id);
    function getRootLink();
    function getChildren(LinkInterface $link);
    function getParents(LinkInterface $link);
    function getTopLinks();
    function addChild(LinkInterface $parentLink, LinkInterface $childLink);
    function addChildren(LinkInterface $parentLink, \Traversable $childrenLinks);
    function getLinkChainFromRoot(LinkInterface $link);
    function getLinksWithTarget($target);
}