<?php

namespace Acme\SymfonyanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SymfonyanBundle:Default:index.html.twig');
    }
}
