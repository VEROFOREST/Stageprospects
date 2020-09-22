<?php

namespace App\Controller;

use App\Entity\PreInscription;
use App\Entity\Prospect;
use App\Form\PreInscriptionType;
use App\Repository\CategFormationRepository;
use App\Repository\ChargeDeRepository;
use App\Repository\FinancementRepository;
use App\Repository\PreInscriptionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;
use Dompdf\Options;


/**
 * @Route("/pre/inscription")
 */
class PreInscriptionController extends AbstractController
{
    /**
     * @Route("/", name="pre_inscription_index", methods={"GET"})
     */
    public function index(PreInscriptionRepository $preInscriptionRepository): Response
    {
        return $this->render('pre_inscription/index.html.twig', [
            'pre_inscriptions' => $preInscriptionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new/{id}", name="pre_inscription_new", methods={"GET","POST"})
     */
    public function new(Prospect $prospect,Request $request): Response
    {
        
        

        return $this->render('pre_inscription/new.html.twig', [
            'prospect'=>$prospect,
            // 'pre_inscription' => $preInscription,
            // 'form' => $form->createView(),
        ]);
    }
     /**
     * @Route("/store/{id}", name="pre_inscription_store", methods={"GET","POST"})
     */
    public function store(Prospect $prospect,Request $request,
                        ChargeDeRepository $ChargeDeRepository,
                        FinancementRepository $financementRepository,
                        CategFormationRepository $categFormationRepository): Response
    {
            $preInscription = new PreInscription();
            // recup de la date
            $date = new \DateTime('@'.strtotime('now'));
            // recup de "charge de "
            $idChargeDe = $request->get ('ChargeDe');
            $ChargesDe = $ChargeDeRepository->findBy(['id'=>$idChargeDe]);
            // recup de la categ de formation (i ou a)
            $idCategFormation = $request->get ('CategFormation');
            $CategFormations =$categFormationRepository->findBy (['id'=>$idCategFormation]);
            dump($CategFormations[0]);
            //  recup du mode de paiement
            $idFinancement =$request->get ('financement');
            $financements =$financementRepository->findBy (['id'=>$idFinancement]);
           
        
            $entityManager = $this->getDoctrine()->getManager();
            // set des colonnes de la table préinscription
            $preInscription->setCreatedAt($date);
            $preInscription->setProspect($prospect);
            $preInscription->setCategFormation($CategFormations[0]);
            $preInscription->setChargeDe($ChargesDe[0]);
            $preInscription->setFinancement($financements[0]);

            $entityManager->persist($preInscription);
            $entityManager->flush();
             
            return $this->redirectToRoute('pre_inscription_confirmation',['id'=> $preInscription->getId()]);
       
        return $this->render('pre_inscription/new.html.twig', [
            'prospect'=>$prospect,
            'pre_inscription' => $preInscription,
            
        ]);
    }
    /**
     * @Route("pdf/{id}", name="pre_inscription_pdf", methods={"GET"})
     */
    public function loadPDF(PreInscription $preInscription): Response
   { 
   }
    /**
     * @Route("/{id}", name="pre_inscription_confirmation", methods={"GET"})
     */
    public function show(PreInscription $preInscription): Response
    {
        
        return $this->render('pre_inscription/confirmation.html.twig', [
           
            'pre_inscription' => $preInscription,
        ]);
    }
    
    /**
     * @Route("/{id}/edit", name="pre_inscription_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PreInscription $preInscription): Response
    {
        $form = $this->createForm(PreInscriptionType::class, $preInscription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pre_inscription_index');
        }

        return $this->render('pre_inscription/edit.html.twig', [
            'pre_inscription' => $preInscription,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pre_inscription_delete", methods={"DELETE"})
     */
    public function delete(Request $request, PreInscription $preInscription): Response
    {
        if ($this->isCsrfTokenValid('delete'.$preInscription->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($preInscription);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pre_inscription_index');
    }
}
