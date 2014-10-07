<?php

namespace AI\Dictionary;

interface DictionaryInterface {
    public function getText($key);
    public function getLanguage();
}