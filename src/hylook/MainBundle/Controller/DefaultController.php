<?php

namespace hylook\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use hylook\MainBundle\Entity\Emisor;
use Symfony\Component\HttpFoundation\Response;
use hylook;
use hylook\MainBundle\hylookMainBundle;
use hylook\MainBundle\Form\UsuariosType;
use hylook\MainBundle\Entity\Usuarios;
use hylook\MainBundle\Form\EmisorType;
use hylook\MainBundle\Entity\Lector;
use hylook\MainBundle\Form\LectorType;

class DefaultController extends Controller
{
	
    public function indexAction()
    {
    	$log = $this->get('logger');
    	$log->addInfo('Carga la portada ');
    	
    	
    	
    	$locale = $this->getRequest()->getLocale();
    	$request = $this->getRequest();
    	$languages = $request->getLanguages();
    	//$language = $request->getPreferredCulture(array('es', 'en'));
    	$PreferredLanguage = $request->getPreferredLanguage();
       foreach ($languages as $clave=>$valor)
   		{
   		echo "El valor de $clave es: $valor <br>";
   		}
   		echo "PreferredLanguage: $PreferredLanguage <br>";
        echo "el default locale es: $locale <br>";
       // $this->getRequest()->setLocale($PreferredLanguage);
       // $locale = $this->getRequest()->getLocale();
     //  echo "el locale del Usuario es: $locale <br>";
       
        $translated = $this ->get('translator')->trans('Inicio');
        echo "Inicio traducido es: $translated";
        return $this->render('hylookMainBundle:Default:index.html.twig');
        
    }
    
    public function emisorAction()
    {
    	return $this->render('hylookMainBundle:Default:emisor.html.twig');
    }
    
    public function lectorAction()
    {
    	return $this->render('hylookMainBundle:Default:lector.html.twig');
    }
    
    public function gruposAction()
    {
    	return $this->render('hylookMainBundle:Default:grupos.html.twig');
    }
    
    public function addOneAction($nombre, $descripcion)
    {
    	$unEmisor = new Emisor();
    	$unEmisor->setNombre($nombre);
    	$unEmisor->setDescripcion($descripcion);
    		
    	$em = $this->getDoctrine()->getManager();
    	$em->persist($unEmisor);
    	$em->flush();
    		
    	return new Response(
    			'Id del nuevo Emisor: '.$unEmisor->getId().'; El emisor se ha creado correctamente' );
    }
    
    public function getAllAction(){
    	$em = $this->getDoctrine()->getManager();
    	$emisores = $em->getRepository('hylookMainBundle:Emisor')->findAll();
    	$res = "Emisores:<br>";
    	foreach ($emisores as $emisor){
    		$res .= $emisor->getNombre().' Descripción: '.$emisor->getDescripcion().'<br>';
    	}
    	return new Response($res);
    }
    
    public function getByIdAction($id){
    	$em = $this->getDoctrine()->getManager();
    	//Opcion atajo 1
    	//$emisor = $em->find('hylookMainBundle:Emisor', $id);
    	//Opcion atajo 2
    	//$emisor = $em->getRepository('hylookMainBundle:Emisor')->find($id);
    	$emisor = $em->getRepository('hylookMainBundle:Emisor')->findOneById($id);
    	$res = "Emisor:<br>";    	
    	$res .= $emisor->getNombre().' Descripción: '.$emisor->getDescripcion().'<br>';
    	return new Response($res);
    	
    }
    
   /*
    public function registroAction()
    {
    	$usuario = new UsuariosType();
    	$formulario = $this->createFormBuilder($usuario)
    	->add('nombre')
        ->add('usernick')
        ->add('passacceso')
    	->getForm();
    	return $this->render('hylookMainBundle:Default:registro.html.twig',	array('formulario' => $formulario->createView())
    			);
    }
    */
    
    public function registroAction()
    {
    	$log = $this->get('logger');
    	$log->addInfo('Registro de usuario ');
    	$peticion = $this->getRequest();
    	$usuario = new Usuarios();
    	$formulario = $this->createForm(new UsuariosType(), $usuario);
    	if ($peticion->getMethod() == 'POST') {
			$formulario->bind($peticion);
			if ($formulario->isValid()) {
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($usuario);
				$em->flush();					
				return $this->redirect($this->generateUrl('hylook_main_homepage'));
			}
		}
    	return $this->render(
    			'hylookMainBundle:Default:registro.html.twig',
    			array('formulario' => $formulario->createView())    			
    			);
    }
    
    public function newemisorAction()
    {
    	$log = $this->get('logger');
    	$log->addInfo('Nuevo Emisor ');
    	$peticion = $this->getRequest();
    	$emisor = new Emisor();
    	$formulario = $this->createForm(new EmisorType(), $emisor);
    	if ($peticion->getMethod() == 'POST') {
    		$formulario->bind($peticion);
    		if ($formulario->isValid()) {
    			$em = $this->getDoctrine()->getEntityManager();
    			$em->persist($emisor);
    			$em->flush();
    			return $this->redirect($this->generateUrl('hylook_main_homepage'));
    		}
    	}
    	return $this->render(
    			'hylookMainBundle:Default:newemisor.html.twig',
    			array('formulario' => $formulario->createView())
    			);
    }
    
    public function newlectorAction()
    {
    	$log = $this->get('logger');
    	$log->addInfo('Nuevo Lector');
    	$peticion = $this->getRequest();
    	$lector = new Lector();
    	$formulario = $this->createForm(new LectorType(), $lector);
    	if ($peticion->getMethod() == 'POST') {
    		$formulario->bind($peticion);
    		if ($formulario->isValid()) {
    			$em = $this->getDoctrine()->getEntityManager();
    			$em->persist($lector);
    			$em->flush();
    			return $this->redirect($this->generateUrl('hylook_main_homepage'));
    		}
    	}
    	return $this->render(
    			'hylookMainBundle:Default:newlector.html.twig',
    			array('formulario' => $formulario->createView())
    			);
    }
    
}

