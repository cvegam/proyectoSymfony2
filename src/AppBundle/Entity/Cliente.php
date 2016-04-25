<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

//se define ORM para que ejecute doctrine ademas de sus caracteristicas

/**
 * @ORM\Entity
 * @ORM\Table(name="Cliente")
 */
 
class Cliente
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="CLIE_ID")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="integer", length=8, name="CLIE_RUT")
     */
    protected $rut;
    
    /**
     * @ORM\Column(type="string", length=1, name="CLIE_DV")
     */ 
    protected $dv;
    
    /**
     * @ORM\Column(type="string", length=100, name="CLIE_NOMBRE")
     */
    protected $nombre;
    
    //se apunta a la entidad y se mapea al atributo
    
    /**
     * @ORM\OneToMany(targetEntity="Dato", mappedBy="cliente")
     */
    protected $datos;
    
    //el array que permite el almacenamiento y previa consulta
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->datos = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set rut
     *
     * @param integer $rut
     *
     * @return Cliente
     */
    public function setRut($rut)
    {
        $this->rut = $rut;

        return $this;
    }

    /**
     * Get rut
     *
     * @return integer
     */
    public function getRut()
    {
        return $this->rut;
    }

    /**
     * Set dv
     *
     * @param string $dv
     *
     * @return Cliente
     */
    public function setDv($dv)
    {
        $this->dv = $dv;

        return $this;
    }

    /**
     * Get dv
     *
     * @return string
     */
    public function getDv()
    {
        return $this->dv;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Cliente
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
     * Add dato
     *
     * @param \AppBundle\Entity\Dato $dato
     *
     * @return Cliente
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
}
