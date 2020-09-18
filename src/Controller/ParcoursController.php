<?php

namespace App\Controller;

use App\Entity\Parcours;
use App\Form\ParcoursType;
use App\Repository\ParcoursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;



/**
 * @Route("/parcours")
 */
class ParcoursController extends AbstractController
{
    /**
     * @Route("/", name="parcours_index", methods={"GET"})
     */
    public function index(ParcoursRepository $parcoursRepository): Response
    {
        return $this->render('parcours/index.html.twig', [
            'parcours' => $parcoursRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="parcours_new", methods={"GET","POST"})
     */
    public function new(Request $request,SluggerInterface $slugger): Response
    {
        $parcour = new Parcours();
        $form = $this->createForm(ParcoursType::class, $parcour);
        $form->handleRequest($request);
          
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $parcour->setId();

            // permet de gérer le fichier uploadé pour le cv
            $cvFile =$form->get('cv')->getData();
            if ($cvFile) {
                $originalFilename = pathinfo($cvFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$cvFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $cvFile ->move(
                        $this->getParameter('brochures_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'cv name' property to store the PDF file name
                // instead of its contents
                $parcour->setCv($newFilename);
            }

            $entityManager->persist($parcour);
            $entityManager->flush();

            return $this->redirectToRoute('prospect_new',['id'=> $parcour->getId()]);
        }

        return $this->render('parcours/new.html.twig', [
            'parcour' => $parcour,
            
            'form' => $form->createView(),
            
        ]);
    }

    /**
     * @Route("/{id}", name="parcours_show", methods={"GET"})
     */
    public function show(Parcours $parcour): Response
    {
        return $this->render('parcours/show.html.twig', [
            'parcour' => $parcour,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="parcours_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Parcours $parcour): Response
    {
        $form = $this->createForm(ParcoursType::class, $parcour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('parcours_index');
        }

        return $this->render('parcours/edit.html.twig', [
            'parcour' => $parcour,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="parcours_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Parcours $parcour): Response
    {
        if ($this->isCsrfTokenValid('delete'.$parcour->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($parcour);
            $entityManager->flush();
        }

        return $this->redirectToRoute('parcours_index');
    }
}
