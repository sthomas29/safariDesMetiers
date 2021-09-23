<?php

namespace App\Controller;

use App\Repository\AnimalRepository;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(Request $request): Response
    {
        $animaux = null;
        $regime = $request->query->get('regime');

        if ($regime) {
            $animaux = $this->repo->getByRegime($regime);
        } else {
            $animaux = $this->repo->findAll();
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'animaux' => $animaux,
        ]);
    }
}
