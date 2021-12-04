<?php

namespace App\Controller\Admin;

use App\Entity\Projet;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProjetCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Projet::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('libelleProjet'),
            TextEditorField::new('descriptionProjet'),
            DateField::new('dateDebut'),
            DateField::new('dateFin'),
            AssociationField::new('typeProjet'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex(),
            ImageField::new('image')->setBasePath('/uploads/projets/')->onlyOnIndex(),
            SlugField::new('slug')->setTargetFieldName('libelleProjet')->hideOnIndex(),
            
        ];
    
    }
}
