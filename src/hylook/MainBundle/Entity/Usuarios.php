<?php

namespace hylook\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuarios
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Usuarios
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="usernick", type="string", length=50)
     */
    private $usernick;

    /**
     * @var string
     *
     * @ORM\Column(name="passacceso", type="string", length=50)
     */
    private $passacceso;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Usuarios
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set usernick
     *
     * @param string $usernick
     * @return Usuarios
     */
    public function setUsernick($usernick)
    {
        $this->usernick = $usernick;
    
        return $this;
    }

    /**
     * Get usernick
     *
     * @return string 
     */
    public function getUsernick()
    {
        return $this->usernick;
    }

    /**
     * Set passacceso
     *
     * @param string $passacceso
     * @return Usuarios
     */
    public function setPassacceso($passacceso)
    {
        $this->passacceso = $passacceso;
    
        return $this;
    }

    /**
     * Get passacceso
     *
     * @return string 
     */
    public function getPassacceso()
    {
        return $this->passacceso;
    }
    
    public function __toString()
    {
    	return $this->getNombre();
    }
}
