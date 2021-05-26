<?php

namespace App\Controller;

use App\Entity\Session;
use App\Entity\Training;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SessionController extends AbstractController
{
    /**
     * @Route("/sessions", name="sessions")
     */
    public function index(): Response
    {
        $sessions = $this->getDoctrine()
            ->getRepository(Session::class)
            ->findBy([], ["title" => "DESC"]);
        return $this->render('session/index.html.twig', [
            'sessions' => $sessions,
        ]);
    }


    /**
     * @Route("/showSession/{id?}", name="show_session")
     */
    public function showSession(Session $session = null): Response
    {
        return $this->render('session/showSession.html.twig', [
            'session' => $session,
        ]);
    }
}
