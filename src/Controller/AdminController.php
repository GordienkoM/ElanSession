<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Module;
use App\Entity\Session;
use App\Entity\Location;
use App\Entity\Training;
use App\Form\ModuleType;
use App\Form\SessionType;
use App\Form\LocationType;
use App\Form\TrainingType;
use App\Entity\TypeTraining;
use App\Form\TypeTrainingType;
use App\Form\RegistrationFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/training", name="training_add")
     */
    public function addTraining(Training $training = NULL, Request $request)
    {
        if (!$training) {
            $training = new Training();
        }

        $form = $this->createForm(TrainingType::class, $training);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $training = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($training);
            $entityManager->flush();

            return $this->redirectToRoute('training_add');
        }

        return $this->render('admin/addTraining.html.twig', [
            'formTraining' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/session", name="session_add")
     */
    public function addSession(Session $session = NULL, Request $request)
    {
        if (!$session) {
            $session = new Session();
        }

        $form = $this->createForm(SessionType::class, $session);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $session = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($session);
            $entityManager->flush();

            return $this->redirectToRoute('session_add');
        }

        return $this->render('admin/addSession.html.twig', [
            'formSession' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/location", name="location_add")
     */
    public function addLocation(Location $location = NULL, Request $request)
    {
        if (!$location) {
            $location = new Location();
        }

        $form = $this->createForm(LocationType::class, $location);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $location = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($location);
            $entityManager->flush();

            return $this->redirectToRoute('location_add');
        }

        return $this->render('admin/addLocation.html.twig', [
            'formLocation' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/module", name="module_add")
     */
    public function addModule(Module $module = NULL, Request $request)
    {
        if (!$module) {
            $module = new Module();
        }

        $form = $this->createForm(ModuleType::class, $module);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $module = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($module);
            $entityManager->flush();

            return $this->redirectToRoute('module_add');
        }

        return $this->render('admin/addModule.html.twig', [
            'formModule' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/typeTraining", name="typeTraining_add")
     */
    public function addTypeTraining(TypeTraining $typeTraining = NULL, Request $request)
    {
        if (!$typeTraining) {
            $typeTraining = new TypeTraining();
        }

        $form = $this->createForm(TypeTrainingType::class, $typeTraining);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeTraining = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeTraining);
            $entityManager->flush();

            return $this->redirectToRoute('typeTraining_add');
        }

        return $this->render('admin/addTypeTraining.html.twig', [
            'formTypeTraining' => $form->createView(),
        ]);
    }
    // /**
    //  * @Route("/admin/collaborator", name="collaborator_add")
    //  */
    // public function addCollaborator(User $collaborator = NULL, Request $request)
    // {
    //     if (!$collaborator) {
    //         $collaborator = new User();
    //     }

    //     $form = $this->createForm(RegistrationFormType::class, $collaborator);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $collaborator = $form->getData();
    //         $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->persist($collaborator);
    //         $entityManager->flush();

    //         return $this->redirectToRoute('collaborator_add');
    //     }

    //     return $this->render('admin/addCollaborator.html.twig', [
    //         'formCollaborator' => $form->createView(),
    //     ]);
    // }

    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
