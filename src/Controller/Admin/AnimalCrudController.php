<?php

namespace App\Controller\Admin;

use App\Entity\Animal;
use App\Form\AnimalType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;

class AnimalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Animal::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Animal')
            ->setEntityLabelInPlural('Animaux')
            ->setSearchFields(['nom', 'text', 'email'])
            ->setDefaultSort(['nom' => 'DESC']);;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new('famille'));
    }


    public function configureFields(string $pageName): iterable
    {
//        return [
////            IdField::new('id'),
//            TextField::new('nom'),
//            TextEditorField::new('description'),
//
//        ];

        $choix = ['User' => 'User',
            'Admin' => 'Admin',
            'SuperAdmin' => 'SuperAdmin'];

        // dd($choix);

        yield TextField::new('nom');
        yield TextField::new('nomScientifique');
        yield TextField::new('photo');
        yield TextField::new('lieuDeVie');
        yield AssociationField::new('famille');
        yield AssociationField::new('regimeAlimentaire');
        yield TextareaField::new('description');
        yield TextField::new('lienWiki');
        yield AssociationField::new('predateurs');
        //->autocomplete()
    }
}
