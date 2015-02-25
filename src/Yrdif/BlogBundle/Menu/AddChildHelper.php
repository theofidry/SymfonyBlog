<?php

namespace Yrdif\BlogBundle\Menu;

use Knp\Menu\ItemInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Helper to add a child element to the attached menu.
 * By added a child with this helper, if the route of the request match the route of the child, this route will have
 * '#' as URI and will be set as activated.
 *
 * @package Yrdif\BlogBundle\Menu
 */
class AddChildHelper
{

    /**
     * @var ItemInterface
     */
    private $menu;

    /**
     * @var Request
     */
    private $request;

    /**
     * Instantiate a helper for the given menu and request.
     *
     * @param ItemInterface $menu
     * @param Request       $request
     */
    function __construct($menu, $request)
    {
        $this->menu = $menu;
        $this->request = $request;
    }

    /**
     * @param string $name  Link name.
     * @param string $route Symfony route name.
     *
     * @return $this
     */
    public function addChild($name, $route)
    {
        if ($this->request->get('_route') === $route) {
            $this->menu
                ->addChild($name, ['uri' => '#'])
                ->setCurrent(true);
        } else {
            $this->menu->addChild($name, ['route' => $route]);
        }

        return $this;
    }
}
