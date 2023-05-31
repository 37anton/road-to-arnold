<?php

namespace App\Controller\Admin;

use App\Entity\SalleDeSport;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class SalleDeSportCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SalleDeSport::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('libelle'),
            AssociationField::new('ville'),
            AssociationField::new('enseigne')
        ];
    }
    
}
