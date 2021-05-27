<?php

namespace App\Controller;

use App\Entity\Session;
use App\Entity\Trainee;
use App\Entity\Location;
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
}
