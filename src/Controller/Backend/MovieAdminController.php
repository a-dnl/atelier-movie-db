<?php

namespace App\Controller\Backend;

use App\Entity\Movie;
use App\Form\MovieType;

use Doctrine\ORM\EntityManager;
use App\Repository\MovieRepository;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

/** @Route("/admin", name="backend_movie_") */
class MovieAdminController extends AbstractController
{
    /**
     * @Route("/", name="list", methods={"GET"})
     */
    public function index(MovieRepository $movieRepo)
    {
        $movies = $movieRepo->findAllOrderedByNameQueryBuilder();
        

        return $this->render('backend/movie/index.html.twig', [
            'page_title' => 'Administration - Liste des films',
            'movies' => $movies
        ]);
    }

    /**
     * @Route("/movie/{id}", name="show", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function show(Movie $movie, Request $request, EntityManagerInterface $em)
    {    
        $form = $this->createForm(MovieType::class, $movie);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($movie);
            $em->flush();
            $this->addFlash(
                'success',
                'Les informations du film ' . $movie->getTitle()  . ' ont été mises à jour !'
            );
        }

        return $this->render('backend/show.html.twig', [
            'page_title' => 'Administration - ' . $movie->getTitle(),
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/movie", name="add", methods={"POST"})
     */
    public function add(Request $request, EntityManagerInterface $em)
    {
        $movie = new Movie();

        $form = $this->createForm(MovieType::class, $movie);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($movie);
            $em->flush();
            $this->addFlash(
                'success',
                'Le film ' . $movie->getTitle()  . ' a été correctement ajouté !'
            );
            return $this->redirectToRoute('backend_movie_list');
        }

        return $this->render('backend/show.html.twig', [
            'page_title' => 'Administration - Ajouter un film',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/movie/{id}", name="delete", methods={"DELETE"}, requirements={"id"="\d+"})
     */
    public function delete(Movie $movie, EntityManagerInterface $em)
    {
        $em->remove($movie);
        $em->flush();
        $this->addFlash(
            'success',
            'Le film ' . $movie->getTitle()  . ' a été supprimé !'
        );
        return $this->redirectToRoute('backend_movie_list');
    }
}
