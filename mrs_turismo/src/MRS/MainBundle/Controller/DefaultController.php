<?php

namespace MRS\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MRSMainBundle:Default:index.html.twig');
    }
}
