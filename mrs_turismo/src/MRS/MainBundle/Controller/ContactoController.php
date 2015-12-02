<?php

namespace MRS\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
// use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use MRS\MainBundle\Form\ContactoType;
use MRS\MainBundle\Entity\Contacto;
// use Symfony\Component\HttpFoundation\File\File;
// use Symfony\Component\Config\FileLocator;
// use Symfony\Component\Config\Symfony\Component\Config;
// use Symfony\Component\Filesystem\Filesystem;
// use Symfony\Component\Translation\Tests\String;

class ContactoController extends Controller
{
	public function nuevoAction(Request $request){
		$inputs = new Contacto();
		$form = $this->createForm(new ContactoType(),$inputs);
		$form->handleRequest($request);
		
		if($form->isValid()){
			$em = $this->getDoctrine()->getManager();
			$nombre = $inputs->getNombre();
			$email = $inputs->getEmail();
			$mensaje = $inputs->getMensaje();
			$allinputs = array(
					'nombre' => $nombre,
					'email' => $email,
					'mensaje' => $mensaje
			);
			
			$this->sendUsConfirmAction($allinputs);
			$this->sendUserConfirmAction($allinputs);
			return $this->render('MRSMainBundle:FAQ:confirmacion.html.twig',$allinputs);
		}
		return $this->render('MRSMainBundle:mrg:contacto.html.twig', array('form'=> $form->createView()));		
	}
	
	/*
	 * al usuario
	 */
	public function sendUserConfirmAction (array $inputs) {
		$email = $inputs['email'];
	
		$mailer = $this->get('mailer');
		$message = \Swift_Message::newInstance()
		->setSubject('Copia del mensaje enviado a MRGeomatics')
		->setFrom('contacto@mrgeomatics.com')
		->setTo($email)
		->setBody(
				$this->renderView('MRSMainBundle:FAQ:touser.html.twig', $inputs),
				'text/html'
				);
		$mailer->send($message);
		//$sent = true;
		//return $sent;
	}
	
	/*
	 * a nosotros
	 */
	public function sendUsConfirmAction (array $inputs) {
	
		$email = $inputs['email'];
		$nombre = $inputs['name'];
		
		//titulo del mensaje para nosotros
		$date = date('Y-m-d');
		$now = date('H:i:s');
		$titulo = "FAQ_" . $nombre . "_" . $date . "T" . $now;
	
		$mailer = $this->get('mailer');
		$message = \Swift_Message::newInstance()
		->setSubject($titulo)
		->setFrom($email)
		->setTo('moresolutions.info@gmail.com')
		->setBody(
				$this->renderView('MRSMainBundle:FAQ:tous.html.twig', $inputs),
				'text/html'
				);
		$mailer->send($message);
	}
}
