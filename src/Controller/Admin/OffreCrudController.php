<?php

namespace App\Controller\Admin;

use App\Entity\Offre;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;

class OffreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Offre::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nomOffre'),
            SlugField::new('slug')->setTargetFieldName('nomOffre'),
            DateField::new('dateOffrePub'),
            AssociationField::new('typeoffre'),
            TextField::new('lieu'),
            TextEditorField::new('descriptionOffre')


        ];
    }
}
