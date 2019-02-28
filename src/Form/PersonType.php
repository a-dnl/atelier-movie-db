<?php

namespace App\Form;

use App\Entity\Person;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PersonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', TextType::class, [
            'label'    => 'Titre du film',
            'constraints' => [
                new NotBlank([
                    'message' => 'Le champ ne doit pas être vide'
                ]),
                new Length([
                    'min'        => 5,
                    'max'        => 50,
                    'minMessage' => 'Pas assez de caractères , attendu : {{ limit }}',
                    'maxMessage' => 'Trop de caractères, attendu: {{ limit }}',
                ])
            ]
        ])
        ->add('send', SubmitType::class, [
            'label' => 'Envoyer'
        ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Person::class,
        ]);
    }
}
