<?php
namespace hylook\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * 
 * @ORM\Entity
 *
 */

class Emisor{
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
	
	public function getId(){
		return $this->id;
	}
	
	

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Emisor
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
     * @return Emisor
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
   

    /**
     * Set usuario
     *
     * @param \hylook\MainBundle\Entity\Usuarios $usuario
     * @return Emisor
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
    
    public function __toString()
    {
    	return $this->getNombre();
    }
}
