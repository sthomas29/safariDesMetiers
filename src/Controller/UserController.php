<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/inscription', name: 'user')]
    public function inscription(Request $request, UserPasswordHasherInterface $passwordEncoder): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $password = $passwordEncoder->hashPassword($user, $user->getPassword());
            $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();

            $em->persist($user);
            $em->flush();
        }

        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'form'=> $form->createView(),
        ]);
    }

    #[Route('/profil', name:'profil-Home')]
    public function profile(){


        return $this->render('user/profil/index.html.twig', [
            'controller_name' => 'UserController',

        ]);
    }
}
