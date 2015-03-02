<?php

namespace Yrdif\BlogBundle\Entity;

/**
 * Class EntityHydrationMethod
 *
 * @package Yrdif\BlogBundle\Entity
 */
trait EntityHydrationTrait
{

    /**
     * Fill entity from array.
     *
     * @param array|null $array
     *
     * @return $this
     */
    public static function createFormArray(array $array = null) {
        $instance = new self;

        foreach ($array as $property => $value) {
            $method = "set{$property}";
            $instance->$method($value);
        }

        return $instance;
    }
}
