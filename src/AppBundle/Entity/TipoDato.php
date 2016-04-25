<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

//se define ORM para que ejecute doctrine ademas de sus caracteristicas

/**
 * @ORM\Entity
 * @ORM\Table(name="TipoDato")
 */

class TipoDato
{
    
    const DIRECCION = 1;
    const COMUNA = 2;
    const EMAIL = 3;
    const TELEFONO = 4;
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="TIDA_ID")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", name="TIDA_DESCRIPCION")
     * 
     */
    protected $descripcion;
    
    //se apunta a la entidad y se mapea al atributo
    
    /**
     * @ORM\OneToMany(targetEntity="Dato", mappedBy="tipoDato")
     */
    protected $datos;
    
    //el array que permite el almacenamiento y previa consulta
    
    public function __construct()
    {
        $this->datos = new ArrayCollection();
    }
    
    //los get y set para recuperar valores a traves de funciones publicas
    
    
    

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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return TipoDato
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
     * Add dato
     *
     * @param \AppBundle\Entity\Dato $dato
     *
     * @return TipoDato
     */
    public function addDato(\AppBundle\Entity\Dato $dato)
    {
        $this->datos[] = $dato;

        return $this;
    }

    /**
     * Remove dato
     *
     * @param \AppBundle\Entity\Dato $dato
     */
    public function removeDato(\AppBundle\Entity\Dato $dato)
    {
        $this->datos->removeElement($dato);
    }

    /**
     * Get datos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDatos()
    {
        return $this->datos;
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return TipoDato
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
