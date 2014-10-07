<?php

namespace AI\Navigation;

interface LinkInterface
{
    public function getId();
    public function getTarget();
    public function getContent();
}