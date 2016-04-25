<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

//se define ORM para que ejecute doctrine ademas de sus caracteristicas

/**
 * @ORM\Entity
 * @ORM\Table(name="Dato")
 */

class Dato
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="DATO_ID")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", name="DATO_DATO")
     */
    protected $dato;
    
    //se apunta a la entidad e inverso desde un atributo
    //join column hace referencia al nombre del atributo y al nombre
    
    /**
     * @ORM\ManyToOne(targetEntity="TipoDato", inversedBy="datos")
     * @ORM\JoinColumn(name="DATO_TIDA_ID", referencedColumnName="TIDA_ID")
     */
    protected $tipoDato;
    
    /**
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="datos")
     * @ORM\JoinColumn(name="DATO_CLIE_ID", referencedColumnName="CLIE_ID")
     */
    protected $cliente;
    
    /**
     * @ORM\ManyToOne(targetEntity="ManejoError", inversedBy="datos")
     * @ORM\JoinColumn(name="DATO_MAER_ID", referencedColumnName="MAER_ID")
     */
    protected $manejoError;
    
    
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
     * Set dato
     *
     * @param string $dato
     *
     * @return Dato
     */
    public function setDato($dato)
    {
        $this->dato = $dato;

        return $this;
    }

    /**
     * Get dato
     *
     * @return string
     */
    public function getDato()
    {
        return $this->dato;
    }

    /**
     * Set tipoDato
     *
     * @param \AppBundle\Entity\TipoDato $tipoDato
     *
     * @return Dato
     */
    public function setTipoDato(\AppBundle\Entity\TipoDato $tipoDato = null)
    {
        $this->tipoDato = $tipoDato;

        return $this;
    }

    /**
     * Get tipoDato
     *
     * @return \AppBundle\Entity\TipoDato
     */
    public function getTipoDato()
    {
        return $this->tipoDato;
    }

    /**
     * Set cliente
     *
     * @param \AppBundle\Entity\Cliente $cliente
     *
     * @return Dato
     */
    public function setCliente(\AppBundle\Entity\Cliente $cliente = null)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \AppBundle\Entity\Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set manejoError
     *
     * @param \AppBundle\Entity\ManejoError $manejoError
     *
     * @return Dato
     */
    public function setManejoError(\AppBundle\Entity\ManejoError $manejoError = null)
    {
        $this->manejoError = $manejoError;

        return $this;
    }

    /**
     * Get manejoError
     *
     * @return \AppBundle\Entity\ManejoError
     */
    public function getManejoError()
    {
        return $this->manejoError;
    }
}
