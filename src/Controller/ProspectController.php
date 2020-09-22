<?php

namespace App\Controller;

use App\Entity\Membre;
use App\Entity\Parcours;
use App\Entity\Prospect;
use App\Form\ProspectType;
use App\Repository\EtapeRepository;
use App\Repository\MembreRepository;
use App\Repository\ProspectRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/prospect")
 */
class ProspectController extends AbstractController
{
    /**
     * @Route("/", name="prospect_index", methods={"GET"})
     */
    public function index(ProspectRepository $prospectRepository): Response
    {
        return $this->render('prospect/index.html.twig', [
            'prospects' => $prospectRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new/{id}", name="prospect_new", methods={"GET","POST"})
     */
    public function new(Parcours $parcour, Request $request, MembreRepository $membreRepository, EtapeRepository $etapeRepository): Response
    {
        $prospect = new Prospect();
        $form = $this->createForm(ProspectType::class, $prospect);
        $form->handleRequest($request);
        $date = new \DateTime('@'.strtotime('now'));
       
        $membres = $membreRepository->findBy(['id'=>1]);
        $etapes = $etapeRepository->findBy(['id'=>1]);
        
        //  dd($membres[0]);
        
       
        if ($form->isSubmitted() && $form->isValid()) {
           
            $entityManager = $this->getDoctrine()->getManager();
            $prospect->setParcours($parcour);
            $prospect->setCreatedAt($date);
            $prospect->setMembre($membres[0]);
            $prospect->setEtape($etapes[0]);
            $prospect->setRole(2);
            $prospect->setActif(-2);
            $entityManager->persist($prospect);
            $entityManager->flush();

            return $this->redirectToRoute('pre_inscription_new',['id'=> $prospect->getId()]);
        }

        return $this->render('prospect/new.html.twig', [
            'prospect' => $prospect,
            'parcours'=>$parcour,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="prospect_show", methods={"GET"})
     */
    public function show(Prospect $prospect): Response
    {
        return $this->render('prospect/show.html.twig', [
            'prospect' => $prospect,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="prospect_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Prospect $prospect): Response
    {
        $form = $this->createForm(ProspectType::class, $prospect);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('prospect_index');
        }

        return $this->render('prospect/edit.html.twig', [
            'prospect' => $prospect,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="prospect_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Prospect $prospect): Response
    {
        if ($this->isCsrfTokenValid('delete'.$prospect->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($prospect);
            $entityManager->flush();
        }

        return $this->redirectToRoute('prospect_index');
    }
}
