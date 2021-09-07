<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Entity\User;
use App\Form\AnimalType;
use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnimalController extends AbstractController
{
    #[Route('/animal', name: 'animal')]
    public function index(): Response
    {
        return $this->render('animal/index.html.twig', [
            'controller_name' => 'AnimalController',
        ]);
    }

    #[Route('/animal/ajout', name: 'animalajout')]
    public function ajout(): Response
    {

        $animal = new Animal();

        $form = $this->createForm(AnimalType::class, $animal);

        return $this->render('animal/index.html.twig', [
            'controller_name' => 'AnimalController',
            'form' => $form->createView(),
        ]);
    }
}
