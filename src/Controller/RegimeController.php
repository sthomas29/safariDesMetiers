<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Entity\RegimeAlimentaire;
use App\Form\AnimalType;
use App\Form\RegimeAlimentaireType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/regime', name: 'regime')]
class RegimeController extends AbstractController
{


    #[Route('/', name: 'regime')]
    public function index(): Response
    {
        $repository = $this->getDoctrine()->getRepository(RegimeAlimentaire::class);


        return $this->render('regime/index.html.twig', [
            'controller_name' => 'RegimeController',
        ]);
    }

    #[Route('/ajout', name: 'regimeAjout')]
    public function ajout(Request $request): Response
    {
        $repository = $this->getDoctrine()->getRepository(RegimeAlimentaire::class);

        $em = $this->getDoctrine()->getManager();

        $regime = new RegimeAlimentaire();
        $form = $this->createForm(RegimeAlimentaireType::class, $regime);

        dump ($request);

        $form->handleRequest($request);
        if ($request->isMethod('post') && $form->isSubmitted()) {

            if ($form->isValid()) {
                $data = $request->request->get('regime_alimentaire');

                $em->persist($regime);
                $em->flush();

                dump($repository->findAll());

                return new RedirectResponse($this->generateUrl('animal'));

            }
        }

        return $this->render('regime/index.html.twig', [
            'controller_name' => 'RegimeController',
            'form' => $form->createView(),
        ]);
    }
}
