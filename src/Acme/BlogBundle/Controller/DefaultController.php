<?php

namespace Acme\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeBlogBundle:Default:index.html.twig');
    }

    public function fooAction($username)
    {
        return $this->render('AcmeBlogBundle:Default:foo.html.twig', [
            'username' => $username,
        ]);
    }
}
