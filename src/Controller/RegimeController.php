<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Entity\RegimeAlimentaire;
use App\Form\AnimalType;
use App\Form\RegimeAlimentaireType;
use App\Repository\RegimeAlimentaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/regime', name: 'regime')]
class RegimeController extends AbstractController
{

    private $em;
    private $repo;

    public function __construct(EntityManagerInterface $entityManager, RegimeAlimentaireRepository $repo)
    {
        $this->em = $entityManager;
        $this->repo = $repo;

    }

    #[Route('/', name: 'regime')]
    public function index(): Response
    {
      return $this->render('regime/index.html.twig', [
            'controller_name' => 'RegimeController',
            'list'=> $this->repo->findAll(),
        ]);
    }

    #[Route('/ajout', name: 'regimeAjout')]
    public function ajout(Request $request): Response
    {

        $em = $this->getDoctrine()->getManager();

        $regime = new RegimeAlimentaire();
        $form = $this->createForm(RegimeAlimentaireType::class, $regime);

        dump($request);

        $form->handleRequest($request);
        if ($request->isMethod('post') && $form->isSubmitted()) {

            if ($form->isValid()) {
                $data = $request->request->get('regime_alimentaire');

                $em->persist($regime);
                $em->flush();

                return new RedirectResponse($this->generateUrl('animal'));

            }
        }

        return $this->render('regime/index.html.twig', [
            'controller_name' => 'RegimeController',
            'form' => $form->createView(),
        ]);
    }
}
