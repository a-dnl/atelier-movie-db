<?php

namespace App\Form;

use App\Entity\Genre;
use App\Entity\Movie;
use App\Entity\Casting;
use App\Repository\GenreRepository;
use App\Repository\CastingRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
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
            ->add('image', UrlType::class, [
                'label'    => "Url de l'image",
            ])
            ->add('genres', EntityType::class, [
                'class' => Genre::class,
                'multiple'=>true,
                'expanded' => true,
                'query_builder' => function (GenreRepository $genreRepo) {
                    return $genreRepo->createQueryBuilder('genre')
                        ->orderBy('genre.name', 'ASC');
                },
                'choice_label' => 'name'
            ])
            ->add('castings', EntityType::class, [
                'class' => Casting::class,
                'multiple'=>true,
                'expanded' => true,
                'query_builder' => function (CastingRepository $castingRepo) {
                    return $castingRepo->createQueryBuilder('casting')
                        ->orderBy('casting.role', 'ASC');
                },
                'choice_label' => 'role'
            ])
            ->add('send', SubmitType::class, [
                'label' => 'Envoyer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }
}
