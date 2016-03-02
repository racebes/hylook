<?php

namespace hylook\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use hylook\MainBundle\Entity\Emisor;
use Symfony\Component\HttpFoundation\Response;
use hylook;
use hylook\MainBundle\hylookMainBundle;

class DefaultController extends Controller
{
    public function indexAction()
    {
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
}

