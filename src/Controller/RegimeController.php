<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegimeController extends AbstractController
{
    #[Route('/regime', name: 'regime')]
    public function index(): Response
    {
        return $this->render('regime/index.html.twig', [
            'controller_name' => 'RegimeController',
        ]);
    }
}
