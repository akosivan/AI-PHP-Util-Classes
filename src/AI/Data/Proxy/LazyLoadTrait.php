<?php
namespace AI\Data\Proxy;

trait LazyLoadTrait {
    public function lazyLoadField($fieldName, $value)
    {
        if (!property_exists(get_class(), $fieldName)) throw new \Exception('Invalid property for class');

        if (!isset($this->$fieldName)) {
            $setterMethodName = 'set' . ucfirst($fieldName);
            if (!method_exists(get_class(), $setterMethodName)) throw new \Exception('Invalid setter method for class');
            $this->$setterMethodName($value);
        }
        return $this->$fieldName;
    }
}