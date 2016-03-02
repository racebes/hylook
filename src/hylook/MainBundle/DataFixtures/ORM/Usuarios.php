<?php

namespace hylook\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use hylook\MainBundle\Entity\Usuarios;

class DatosUsuarios implements FixtureInterface {
	
	public function load (ObjectManager $manager)
	{
		$usuarios = array(
				array('nombre'=> 'usuario1', 'usernick' => 'nick01', 'passacceso' => '123456'),
				array('nombre'=> 'usuario2', 'usernick' => 'nick02', 'passacceso' => '654321'),
				array('nombre'=> 'usuario3', 'usernick' => 'nick03', 'passacceso' => '112233')				
		);
		foreach ($usuarios as $usuario) {
			$entidad = new Usuarios();
			$entidad->setNombre($usuario['nombre']);
			$entidad->setUsernick($usuario['usernick']);
			$entidad->setPassacceso($usuario['passacceso']);			
			$manager->persist($entidad);
		}
		$manager->flush();
	}
	
}


