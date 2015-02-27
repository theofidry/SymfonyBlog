<?php

namespace Yrdif\BlogBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Alice\DataFixtureLoader;
use Nelmio\Alice\Fixtures;

/**
 * Class DataLoader
 *
 * @package Yrdif\BlogBundle\DataFixtures\ORM
 */
class DataLoader extends DataFixtureLoader
{

    /**
     * {@inheritdoc}
     */
    protected function getFixtures()
    {
        return [
            __DIR__ . '/contact.yml'
        ];
    }
}
