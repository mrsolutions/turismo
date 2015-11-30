<?php

namespace MRS\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class NavbarController extends Controller
{
    public function principalAction()
    {
        return $this->render('MRSMainBundle:mrg:principal.html.twig');
    }
    
    public function empresaAction()
    {
    	return $this->render('MRSMainBundle:mrg:empresa.html.twig');
    }
    
    public function turismoAction($pueblo)
    {
    	return $this->render('MRSMainBundle:mrg:turismo.html.twig',array('pueblo'=>$pueblo));
    }
    
    public function contactoAction()
    {
    	return $this->render('MRSMainBundle:mrg:contacto.html.twig');
    }
}