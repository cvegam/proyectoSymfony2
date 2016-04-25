<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ManejoError
 *
 * @ORM\Table(name="ManejoError")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ManejoErrorRepository")
 */
class ManejoError
{
    const SIN_ERROR = 0;
    const ERROR_DIRECCION = 1;
    const COMUNA_NO_COINCIDE = 2;
    const FORMATO_EMAIL_NO_COINCIDE = 3;
    const NUMERO_MENOR_9_DIGITOS = 4;
    const NUMERO_MAYOR_9_DIGITOS = 5;
    const NUMERO_FORMATO_TEXTO = 6;
    


    /**
     * @var int
     *
     * @ORM\Column(name="MAER_ID", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="MAER_DESCRIPCION", type="string", length=255)
     */
    private $descripcion;
    
    /**
     * @ORM\OneToMany(targetEntity="Dato", mappedBy="manejoError")
     */
    protected $datos;


   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->datos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return ManejoError
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return ManejoError
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
     * @return ManejoError
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
