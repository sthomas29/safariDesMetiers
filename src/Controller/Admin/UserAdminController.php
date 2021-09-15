<?php

namespace App\Controller\Admin;

use App\Entity\User\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserAdminController extends EasyAdminController
{
    /**
     * @var UserPasswordHasherInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function persistUserEntity($user)
    {
// Avec FOSUserBundle, on faisait comme ça :
// $this->get('fos_user.user_manager')->updateUser($user, false);
        $this->updatePassword($user);
        parent::persistEntity($user);
    }

    public function updateUserEntity($user)
    {
// Avec FOSUserBundle, on faisait comme ça :
//$this->get('fos_user.user_manager')->updateUser($user, false);
        $this->updatePassword($user);
        parent::updateEntity($user);
    }

    public function updatePassword(User $user)
    {
        if (!empty($user->getPlainPassword())) {
            $user->setPassword($this->passwordEncoder->encodePassword($user, $user->getPlainPassword()));
        }
    }
}
