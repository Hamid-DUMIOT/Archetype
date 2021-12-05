<?php

namespace App\Controller\Admin;

use App\Entity\TypeProjet;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeProjetCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeProjet::class;
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
