<?php

namespace App\Controller;

use App\Entity\Training;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SessionController extends AbstractController
{
    /**
     * @Route("/trainings", name="trainings")
     */
    public function index(): Response
    {
        $trainings = $this->getDoctrine()
            ->getRepository(Training::class)
            ->findBy([], ["title" => "DESC"]);
        return $this->render('session/index.html.twig', [
            'trainings' => $trainings,
        ]);
    }


    /**
     * @Route("/showTraining/{id?}", name="show_training")
     */
    public function showTraining(Training $training = null): Response
    {
        return $this->render('forum/trainingAndPosts.html.twig', [
            'training' => $training,
        ]);
    }
}
