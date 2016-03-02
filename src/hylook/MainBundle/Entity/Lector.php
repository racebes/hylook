<?php
namespace hylook\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * 
 * @ORM\Entity
 *
 */

class Lector{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */
	private $id;
	/**
	 *
	 * @ORM\Column(type="string", length=200)
	 */
	protected $nombre;
	/**
	 *
	 * @ORM\Column(type="string", length=200)
	 */
	protected $descripcion;
	/**
	 *
	 * @ORM\ManyToOne(targetEntity="hylook\MainBundle\Entity\Usuarios")
	 */
	protected $usuario;
	
	public function __construct($nombre, $descripcion, Usuarios $usuario){
	
		$this -> nombre = $nombre;
		$this -> descripcion = $descripcion;
		$this -> usuario = $usuario;
	
	}
	
	public function getId(){
	return $this->id;
	
	}
	
	

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Lector
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Lector
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    
    public function __toString()
    {
    	return $this->getNombre();
    }

    /**
     * Set usuario
     *
     * @param \hylook\MainBundle\Entity\Usuarios $usuario
     * @return Lector
     */
    public function setUsuario(\hylook\MainBundle\Entity\Usuarios $usuario = null)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return \hylook\MainBundle\Entity\Usuarios 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}
