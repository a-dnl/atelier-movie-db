<?php

namespace App\Controller\Backend;

use App\Entity\Genre;
use App\Form\GenreType;
use App\Repository\GenreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/** @Route("/admin", name="backend_genre_") */
class GenreAdminController extends AbstractController
{
    /**
     * @Route("/genre", name="list", methods={"GET"})
     */
    public function index(GenreRepository $genreRepo)
    {
        $genres = $genreRepo->findAll();

        return $this->render('backend/genre/index.html.twig', [
            'page_title' => 'Liste des genres',
            'genres' => $genres
        ]);
    }

    /**
     * @Route("/genre/{id}", name="show", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function show(Genre $genre, Request $request, EntityManagerInterface $em)
    {    
        $form = $this->createForm(GenreType::class, $genre);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($genre);
            $em->flush();
            $this->addFlash(
                'success',
                'Les informations du genre ' . $genre->getName()  . ' ont été mis à jour !'
            );
        }

        return $this->render('backend/show.html.twig', [
            'page_title' => 'Administration - ' . $genre->getName(),
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/genre", name="add", methods={"POST"})
     */
    public function add(Request $request, EntityManagerInterface $em)
    {
        $genre = new Genre();

        $form = $this->createForm(GenreType::class, $genre);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($genre);
            $em->flush();
            $this->addFlash(
                'success',
                'La genre ' . $genre->getName()  . ' a été ajouté à la base de données !'
            );
            return $this->redirectToRoute('backend_genre_list');
        }

        return $this->render('backend/show.html.twig', [
            'page_title' => 'Administration - Ajouter un genre',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/genre/{id}", name="delete", methods={"DELETE"}, requirements={"id"="\d+"})
     */
    public function delete(Genre $genre, EntityManagerInterface $em)
    {
        $em->remove($genre);
        $em->flush();
        $this->addFlash(
            'success',
            'Le genre ' . $genre->getName()  . ' a été supprimé de la base de données !'
        );
        return $this->redirectToRoute('backend_genre_list');
    }
}
