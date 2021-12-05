<?php

namespace App\Form;

use Vich\UploaderBundle\Entity\File;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class PostulerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomPoste', TextType::class, ['label' => 'Nom du Poste'])
            ->add('Nom', TextType::class)
            ->add('Prenom', TextType::class)
            ->add('Email', EmailType::class)
            ->add('Telephone', NumberType::class)

            ->add('Message', TextareaType::class, ['label' => 'Votre Message'])
            /* ->add('files', FileType::class, [
                'label' => 'Documents : CV, Lettres de motivation,...',
                'multiple' => true,
                'constraints' => [
                    new File([
                        'maxSize' => '2048k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                        ],
                        'mimeTypesMessage' => 'Merci de téleverser un PDF document, 2mo max.',
                    ])
                ],
            ])*/
            ->add('Envoyer', SubmitType::class, [
                'attr' => ['class' => 'btn btn-outline-dark'], 'label' => 'Postuler'
            ])

            ->add('Vider', ResetType::class, [
                'attr' => ['class' => 'btn btn-outline-dark']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
