<?php

namespace App\Controller\Admin;

use App\Entity\RegimeAlimentaire;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RegimeAlimentaireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RegimeAlimentaire::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
