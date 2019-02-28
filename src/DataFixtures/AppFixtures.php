<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Genre;
use App\Entity\Movie;
use App\Entity\Person;
use App\Entity\Casting;
use Faker\ORM\Doctrine\Populator;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\DataFixtures\Faker\MovieAndGenreProvider;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $em)
    {
        //j'indique a faker de me preparer un generateur de données avec la langue souhaitée
        $generator = Factory::create('fr_FR');

        /*
         Lorsque je créé un generator Faker , celui va aller chercher toutes les classes
         de base de chez faker + celle specifique a la langue si necessaire.

         De ce fait, je peux moi aussi rajouter mon provider(fournisseur) de données custom avant l'appel au populator

        */
        $generator->addProvider(new MovieAndGenreProvider($generator));

        $populator = new Populator($generator, $em);
        
        $populator->addEntity(Genre::class,30, array(
            'name' => function() use ($generator) { return $generator->unique()->movieGenre(); },
        ));

        $populator->addEntity(Movie::class, 50, array(
            'title' => function() use ($generator) { return $generator->unique()->movieTitle(); },
        ));
        
        $populator->addEntity(Person::class, 100, array(
          'name' => function() use ($generator) { return $generator->name(); },
        ));

        $populator->addEntity(Casting::class, 50, array(
            'orderCredit' => function() use ($generator) { return $generator->numberBetween(1, 200); },
            'role' => function() use ($generator) { return $generator->jobTitle(); },
        ));
  
        // a ce stade j'enregistre les data généré par faker
        $insertedEntities = $populator->execute();

        // ici je dois recuperer mes données Movie et Genre car Faker presente un bug qui ne remplit pas la table en many to many
        $movies = $insertedEntities['App\Entity\Movie'];
        $genres = $insertedEntities['App\Entity\Genre'];

        //association manuelle entre movie et genre
        foreach($movies as $movie){
            /*
             Pour obtenir 3 genre par exemple pour un film.

             Je ne dois pas avoir 2 ou 3 genre identique mais bien distinct. Je n'ai plus acces a ce stade aux methodes de faker.

             Dans mon cas , array_rand() ne m'assure pas à 100% de ne pas avoir de données en double. De ce fait , je melange l'integralité de mon tableau et je recupere pour chaque film les 3 premier genre melangé ce qui m'assure d'en avori toujours 3 differents
            */
            shuffle($genres);

            $movie->addGenre($genres[0]);
            $movie->addGenre($genres[1]);
            $movie->addGenre($genres[2]);

            $em->persist($movie);
        }

        $em->flush();
    }
}
