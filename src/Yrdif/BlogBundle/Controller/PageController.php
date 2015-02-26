<?php

namespace Yrdif\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DefaultController
 *
 * @package Yrdif\BlogBundle\Controller
 */
class PageController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('YrdifBlogBundle:Post');

        $posts = $repository->findAllOrderedByCreatedAt();

        return $this->render(
            'YrdifBlogBundle:Page:index.html.twig',
            [
                'posts' => $posts
            ]
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function aboutAction()
    {
        return $this->render('YrdifBlogBundle:Page:about.html.twig');
    }
}
