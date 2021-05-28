<?php

namespace App\Controller;

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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    /**
     * Route("/admin/training/{id}/edit", name="training_edit")
     * @Route("/admin/training", name="training_add")
     */
    public function addTraining(Training $training = NULL, Request $request)
    {
        $trainingRepository = $this->getDoctrine()->getRepository(Training::class);
        $trainings = $trainingRepository->findBy([], ["title" => "ASC"]);

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
            'formTraining'  => $form->createView(),
            'trainings'     => $trainings,

        ]);
    }
    /**
     * @Route("/admin/training/{id}/suppr",name="training_suppr")  
     */
    public function supprimerTraining(Training $training = NULL)
    {
        $suppr = $this->getDoctrine()->getManager();
        $suppr->remove($training);
        $suppr->flush();

        return $this->redirectToRoute('training_add');
    }

    /**
     * @Route("/admin/session/{id}/edit", name="session_edit")
     * @Route("/admin/session", name="session_add")
     */
    public function addSession(Session $session = NULL, Request $request)
    {
        $sessionRepository = $this->getDoctrine()->getRepository(Session::class);

        $sessions = $sessionRepository->findBy([], ["startDate" => "ASC"]);
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
            'sessions' => $sessions
        ]);
    }
    /**
     * @Route("/admin/location/{id}/edit", name="location_edit")
     * @Route("/admin/location", name="location_add")
     */

    public function addLocation(Location $location = NULL, Request $request)
    {
        $locationRepository = $this->getDoctrine()->getRepository(Location::class);

        $locations = $locationRepository->findBy([], ["city" => "ASC"]);
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
            'locations'    => $locations
        ]);
    }
    /**
     * @Route("/admin/module/{id}/edit", name="module_edit")
     * @Route("/admin/module", name="module_add")
     */
    public function addModule(Module $module = NULL, Request $request)
    {
        $moduleRepository = $this->getDoctrine()->getRepository(Module::class);

        $modules = $moduleRepository->findBy([], ["title" => "ASC"]);
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
            'modules'    => $modules
        ]);
    }
    /**
     * @Route("/admin/module/{id}/suppr",name="module_suppr")  
     */
    public function supprimerModule(Module $module = NULL)
    {
        $suppr = $this->getDoctrine()->getManager();
        $suppr->remove($module);
        $suppr->flush();

        return $this->redirectToRoute('module_add');
    }
    /**
     * @Route("/admin/typeTraining/{id}/edit", name="typeTraining_edit")
     * @Route("/admin/typeTraining", name="typeTraining_add")
     */
    public function addTypeTraining(TypeTraining $typeTraining = NULL, Request $request)
    {
        $typeTrainingRepository = $this->getDoctrine()->getRepository(TypeTraining::class);

        $typeTrainings = $typeTrainingRepository->findBy([], ["title" => "ASC"]);
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
            'typeTrainings'    => $typeTrainings
        ]);
    }
    /**
     * @Route("/admin/typeTraining/{id}/suppr",name="typeTraining_suppr")  
     */
    public function supprimerTypeTraining(typeTraining $typeTraining = NULL)
    {
        $suppr = $this->getDoctrine()->getManager();
        $suppr->remove($typeTraining);
        $suppr->flush();

        return $this->redirectToRoute('typeTraining_add');
    }
    /**
     * @Route("/admin/location/{id}/suppr",name="location_suppr")  
     */
    public function supprimerLocation(Location $location = NULL)
    {
        $suppr = $this->getDoctrine()->getManager();
        $suppr->remove($location);
        $suppr->flush();

        return $this->redirectToRoute('location_add');
    }
    /**
     * @Route("/admin/session/{id}/suppr",name="session_suppr")  
     */
    public function supprimerSession(Session $session = NULL)
    {
        $suppr = $this->getDoctrine()->getManager();
        $suppr->remove($session);
        $suppr->flush();

        return $this->redirectToRoute('session_add');
    }


    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
    /**
     * @Route("/register", name="register")
     */
    public function Collaborateurs(): Response
    {
        $userRepository = $this->getDoctrine()->getRepository(User::class);

        $collaborateurs = $userRepository->findBy([], ["email" => "ASC"]);
        return $this->render('registration/register.html.twig', [
            'collaborateurs' => $collaborateurs
        ]);
    }
}
