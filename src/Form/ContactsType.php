<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom', TextType::class)

            ->add('Prenom', TextType::class)  //sans accent

            ->add('Email', EmailType::class)

            ->add('Telephone', NumberType::class, array(
                'attr' => ['pattern' => '/^[0-9]{10}$/', 'length' => 10]
            ))

            ->add('Budget', MoneyType::class, [
                'required'   => false
            ]) //peut etre nul
            ->add('Type', ChoiceType::class, [
                'label' => 'Type de Projet',
                'choices' => [
                    'Rénovation' => 'Rénovation',
                    'Construction' => 'Construction',
                    'Design' => 'Design',
                    'Autre' => 'Autre'
                ]

            ])

            ->add('Message', TextareaType::class, ['label' => 'Votre Message'])

            ->add('Envoyer', SubmitType::class, [
                'attr' => ['class' => 'btn btn-outline-dark', 'far icon' => 'paper-plane']
            ])

            //. \PHP_EOL .

            ->add('Vider', ResetType::class, [
                'attr' => ['class' => 'btn btn-outline-dark', 'justify-content-md-center']
            ]);

        //  ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
