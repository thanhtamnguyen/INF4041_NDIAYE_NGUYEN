<?php
// src/Zoo/PlatformBundle/Controller/UserController.php

namespace Zoo\PlatformBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller{
    /*
    * @Route("/login", name="zoo_platform_login")
    */

    public function loginAction(){
        $content = $this
                ->get('templating')
                ->render('ZooPlatformBundle:Base:login.html.twig',
                        array('nom' => 'user'));
        return new Response($content);
//        return new Response("bla");

    }

}
?>