<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Entity\Person;
use App\Entity\Casting;

use App\Repository\GenreRepository;
use App\Repository\MovieRepository;
use App\Repository\CastingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MovieController extends AbstractController
{
    /**
     * @Route("/", name="movie_list", methods={"GET"})
     */
    public function index(MovieRepository $movieRepo, GenreRepository $genreRepo)
    {
        $movies = $movieRepo->findAllOrderedByNameQueryBuilder();
        $genres = $genreRepo->findAll();

        return $this->render('movie/index.html.twig', [
            'page_title' => 'Liste des films',
            'movies' => $movies,
            'genres' => $genres
        ]);
    }

    /**
     * @Route("/movie/{id}", name="movie_show", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function show(Movie $movie,CastingRepository $castingRepo)
    {
        $castings = $castingRepo->findByMovieDQL($movie);
        
        return $this->render('movie/show.html.twig', [
            'page_title' => 'Film - ' . $movie->getTitle(),
            'movie' => $movie,
            'castings' => $castings
        ]);
    }
}
