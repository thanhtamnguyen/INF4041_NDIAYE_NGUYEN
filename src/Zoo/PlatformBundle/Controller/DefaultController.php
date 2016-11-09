<?php

namespace Zoo\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ZooPlatformBundle:Default:index.html.twig');
    }
}
