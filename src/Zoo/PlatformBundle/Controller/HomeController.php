<?php
// src/Zoo/PlatformBundle/Controller/HomeController.php

namespace Zoo\PlatformBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller{
    /*
    * @Route("/home", name="zoo_platform_home")
    */
    public function indexAction(){
        $content = $this
                ->get('templating')
                ->render('ZooPlatformBundle:Base:home.html.twig',
                        array('nom' => 'Visiteur'));
        return new Response($content);
    }
    
}
?>