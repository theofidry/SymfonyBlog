<?php

namespace Yrdif\BlogBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;

/**
 * Creates the bundle menus.
 *
 * @package Yrdif\BlogBundle\Menu
 */
//TODO: tests unit
class Builder extends ContainerAware
{

    /**
     * @param FactoryInterface $factory
     * @param array            $options
     *
     * @return \Knp\Menu\ItemInterface
     */
    public function headerMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory
            ->createItem('root')
            ->setChildrenAttribute('class', 'nav navbar-nav');
        $helper = new AddChildHelper($menu, $this->container->get('request'));

        $helper
            ->addChild('Home', 'yrdif_blog_homepage')
            ->addChild('About', 'yrdif_blog_about')
            ->addChild('Contact', 'contact-request_new');

        return $menu;
    }
}
