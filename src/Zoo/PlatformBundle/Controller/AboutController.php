<?php
// src/Zoo/PlatformBundle/Controller/AboutController.php

namespace Zoo\PlatformBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AboutController extends Controller{
    /*
    * @Route("/home", name="zoo_platform_about")
    */
    public function indexAction(){
        $content = $this
                ->get('templating')
                ->render('ZooPlatformBundle:Base:about.html.twig',
                        array('nom' => 'Anonym'));
        return new Response($content);
    }
    

}
?>