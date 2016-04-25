<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Cliente;
use AppBundle\Entity\Dato;
use AppBundle\Entity\TipoDato;
use AppBundle\Entity\ManejoError;

class DefaultController extends Controller
{
    /**
     * @Route("/pagina", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        
        return $this->render('layout/layout.html.twig');
       
    }
    
    /**
     * @Route("/addDato", name="addDato")
     */
    public function addDatosAction ( )
    {
        $em = $this->getDoctrine()->getManager();
        
        $gestor = fopen('C:\prueba\datos.csv', "r");
            while (($datos = fgetcsv($gestor, 1000, ";")) !== FALSE) {
                
                $num = count ($datos);
                $rut = $datos[0];
                $dv = $datos[1];
                $nombre = $datos[2];
                $direccion = $datos[3];
                $comuna = $datos[4];
                $email = $datos[5];
                $telefono1 = $datos[6];
                
                $cliente = New Cliente();
                $cliente->setRut($rut);
                $cliente->setDv($dv);
                $cliente->setNombre($nombre);
                
                //VALIDAR DIRECCION
                if($direccion !== ''){
                    $tipoDato = $this->getDoctrine()->getRepository('AppBundle:TipoDato')->findOneById(TipoDato::DIRECCION);
                    if($direccion == ''){
                        $manejoError = $this->getDoctrine()->getRepository('AppBundle:ManejoError')->findOneById(ManejoError::DIRECCION_NO_COINCIDE);
                    } else {
                        $manejoError = $this->getDoctrine()->getRepository('AppBundle:ManejoError')->findOneById(ManejoError::SIN_ERROR);
                    }
                    $dato = New Dato();
                    $dato->setDato($direccion);
                    $dato->setTipoDato($tipoDato);
                    $dato->setManejoError($manejoError);
                    $dato->setCliente($cliente);
                }
                
                //VALIDAR COMUNA
                if($comuna !== ''){
                    $tipoDato = $this->getDoctrine()->getRepository('AppBundle:TipoDato')->findOneById(TipoDato::COMUNA);
                    if($comuna == ''){
                        $manejoError = $this->getDoctrine()->getRepository('AppBundle:ManejoError')->findOneById(ManejoError::COMUNA_NO_COINCIDE);
                    } else {
                        $manejoError = $this->getDoctrine()->getRepository('AppBundle:ManejoError')->findOneById(ManejoError::SIN_ERROR);
                    }
                    $dato = New Dato();
                    $dato->setDato($direccion);
                    $dato->setTipoDato($tipoDato);
                    $dato->setManejoError($manejoError);
                    $dato->setCliente($cliente);
                }
                
                //VALIDAR EMAIL
                if($email !== ''){
                    $tipoDato = $this->getDoctrine()->getRepository('AppBundle:TipoDato')->findOneById(TipoDato::EMAIL);
                    if($email == ''){
                        $manejoError = $this->getDoctrine()->getRepository('AppBundle:ManejoError')->findOneById(ManejoError::FORMATO_EMAIL_NO_COINCIDE);
                    } else {
                        $manejoError = $this->getDoctrine()->getRepository('AppBundle:ManejoError')->findOneById(ManejoError::SIN_ERROR);
                    }
                    $dato = New Dato();
                    $dato->setDato($direccion);
                    $dato->setTipoDato($tipoDato);
                    $dato->setManejoError($manejoError);
                    $dato->setCliente($cliente);
                }
                
                //VALIDAR TELEFONO
                if($telefono !== ''){
                    $tipoDato = $this->getDoctrine()->getRepository('AppBundle:TipoDato')->findOneById(TipoDato::TELEFONO);
                    
                    if($telefono < 9){
                        $manejoError = $this->getDoctrine()->getRepository('AppBundle:ManejoError')->findOneById(ManejoError::NUMERO_MENOR_9_DIGITOS);
                    
                    if($telefono > 9){
                        $manejoError = $this->getDoctrine()->getRepository('AppBundle:ManejoError')->findOneById(ManejoError::NUMERO_MAYOR_9_DIGITOS);
                    
                    if($telefono !== string){
                        $manejoError = $this->getDoctrine()->getRepository('AppBundle:ManejoError')->findOneById(ManejoError::NUMERO_FORMATO_TEXTO);
                        
                    } else {
                        $manejoError = $this->getDoctrine()->getRepository('AppBundle:ManejoError')->findOneById(ManejoError::SIN_ERROR);
                    }
                    $dato = New Dato();
                    $dato->setDato($direccion);
                    $dato->setTipoDato($tipoDato);
                    $dato->setManejoError($manejoError);
                    $dato->setCliente($cliente);
                }
                
                $tipoDato = $this->getDoctrine()->getRepository('AppBundle:TipoDato')->findOneById(TipoDato::DIRECCION);
                $manejoError = $this->getDoctrine()->getRepository('AppBundle:ManejoError')->findOneById(ManejoError::SIN_ERROR);
                
                $dato = New Dato();
                $dato->setDato($direccion);
                $dato->setTipoDato($tipoDato);
                $dato->setManejoError($manejoError);
                $dato->setCliente($cliente);
                
                $em->persist($cliente);
                $em->persist($dato);
            }
            $em->flush();
        fclose($gestor); 
     
        return $this->render('default/addDato.html.twig');
    }
}
