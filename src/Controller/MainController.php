<?php

namespace App\Controller;

use App\Entity\Session;
use App\Entity\Trainee;
use App\Entity\Location;
use App\Form\TraineeType;
use App\Form\TraineeSassionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(): Response
    {
        $sessionRepository = $this->getDoctrine()->getRepository(Session::class);
        $sessions = $sessionRepository->findNextThree();
        $nbsessions = $sessionRepository->countSessions();
     
        $nbtrainees = $this->getDoctrine()->getRepository(Trainee::class)->countTrainees();
        $nblocations = $this->getDoctrine()->getRepository(Location::class)->countLocations();

        return $this->render('main/index.html.twig', [
            'sessions' => $sessions,
            'nbsessions' => $nbsessions,
            'nbtrainees' => $nbtrainees,
            'nblocations' => $nblocations
        ]);
    }

    /**
     * @Route("/stagiaires", name="stagiaires")
     */
    public function stagiaires(Trainee $trainee = NULL, Request $request): Response
    {
        $stagiaireRepository = $this->getDoctrine()->getRepository(Trainee::class);
    
        if (!$trainee) {
            $trainee = new Trainee();
        }

        $form = $this->createForm(TraineeType::class, $trainee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trainee = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($trainee);
            $entityManager->flush();

            return $this->redirectToRoute('stagiaires');
        }


        $stagiaires = $stagiaireRepository->findBy([], ["lastName" => "ASC"]);
        return $this->render('main/stagiaires.html.twig', [
            'formTrainee' => $form->createView(),
            'stagiaires' => $stagiaires
        ]);
    }
    
    /**
     * @Route("/showStagiaire/{id}", name="show_stagiaire")
     */
    public function showTrainee(Trainee $trainee= null, Request $request): Response
    {

        $form = $this->createForm(TraineeSassionType::class, $trainee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('show_stagiaire',["id"=>$trainee->getId()]);
        }

        return $this->render('main/showStagiaire.html.twig', [
            'formTrainee' => $form->createView(),
            'stagiaire' => $trainee,
        ]);
    }
}

