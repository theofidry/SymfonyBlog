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
     * @param array $data
     */
    public function fromArray($data = [])
    {
        foreach ($data as $property => $value) {
            $method = "set{$property}";
            $this->$method($value);
        }
    }
}
