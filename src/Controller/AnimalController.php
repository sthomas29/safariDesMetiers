<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Entity\User;
use App\Form\AnimalType;
use App\Form\RegisterType;
use App\Repository\AnimalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnimalController extends AbstractController
{
    private $em;
    private $repo;

    public function __construct(EntityManagerInterface $entityManager, AnimalRepository $repo)
    {
        $this->em = $entityManager;
        $this->repo = $repo;
    }

    #[Route('/animal', name: 'animal')]
    public function index(): Response
    {

        $animaux = $this->repo->findAll();

        dump($animaux);
        return $this->render('animal/index.html.twig', [
            'controller_name' => 'AnimalController',
            'animaux' => $animaux,
        ]);
    }

    #[Route('animal/ajout', name: 'animalajout')]
    public function ajout(): Response
    {
        $animal = new Animal();
        $form = $this->createForm(AnimalType::class, $animal);
        return $this->render('animal/index.html.twig', [
            'controller_name' => 'AnimalController',
            'form' => $form->createView(),
        ]);
    }

    #[Route('animal/{nom}', name: ('showAnimal'))]
    public function showAnimal(Request $request, $nom): Response
    {
        $animal = $this->repo->findBy(['nom' => $nom]);

        dump($animal[0]);

        return $this->render('animal/show.html.twig', [
            'controller_name' => 'AnimalController',
            'animal' => $animal[0],
        ]);
    }
}
