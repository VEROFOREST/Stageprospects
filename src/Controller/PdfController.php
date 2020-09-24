<?php

namespace App\Controller;

use App\Entity\PreInscription;
use Knp\Snappy\Pdf;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\BrowserKit\Response;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Routing\Annotation\Route;




class PdfController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index() 
    {
        return $this->render('helloworld.html.twig', [
            
        ]);
    }
    
    /**
     * @Route("/pdf/{id}", name="pdf")
     */
     
    
    public function getPdf( PreInscription $preInscription, \Knp\Snappy\Pdf $knpsnappy, ContainerInterface $container) 
    {
      
        
    
        $html = $this->renderView('pre_inscription/recappreinsc.html.twig', array(
            'preinscription'  => $preInscription
        ));
        // dd($knpsnappy); 
        return new PdfResponse(
            
           $knpsnappy->getOutputFromHtml($html),
            'file.pdf'
        
        );
        // dd('ppl'); 
           
    }


}
