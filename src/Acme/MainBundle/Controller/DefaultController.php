<?php

namespace Acme\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeMainBundle:Default:index.html.twig');
    }
    public function introAction()
    {
        return $this->render('AcmeMainBundle:Default:intro.html.twig');
    }
    public function aboutAction()
    {
        return $this->render('AcmeMainBundle:Default:about.html.twig');
    }
    
     public function adminAction()
    {
        return new Response('Admin page!');
    }
}
