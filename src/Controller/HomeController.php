<?php

namespace App\Controller;

use App\Repository\AnimalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $em;
    private $repo;

    public function __construct(EntityManagerInterface $entityManager, AnimalRepository $repo)
    {
        $this->em = $entityManager;
        $this->repo = $repo;

    }

    #[Route('/safari', name: 'home')]
    public function index(): Response
    {
        $animaux = $this->repo->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'animaux' => $animaux,
        ]);
    }
}
