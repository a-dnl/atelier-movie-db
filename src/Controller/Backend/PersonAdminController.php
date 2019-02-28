<?php

namespace App\Controller\Backend;

use App\Entity\Person;
use App\Form\PersonType;
use App\Repository\PersonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/** @Route("/admin", name="backend_person_") */
class PersonAdminController extends AbstractController
{
    /**
     * @Route("/person", name="list", methods={"GET"})
     */
    public function index(PersonRepository $personRepo)
    {
        $persons = $personRepo->findAll();

        return $this->render('backend/person/index.html.twig', [
            'page_title' => 'Liste des personnes',
            'persons' => $persons
        ]);
    }

    /**
     * @Route("/person/{id}", name="show", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function show(Person $person, Request $request, EntityManagerInterface $em)
    {    
        $form = $this->createForm(PersonType::class, $person);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($person);
            $em->flush();
            $this->addFlash(
                'success',
                'Les informations de la personne ' . $person->getName()  . ' ont été misees à jour !'
            );
        }

        return $this->render('backend/show.html.twig', [
            'page_title' => 'Administration - ' . $person->getName(),
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/person", name="add", methods={"POST"})
     */
    public function add(Request $request, EntityManagerInterface $em)
    {
        $person = new person();

        $form = $this->createForm(PersonType::class, $person);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($person);
            $em->flush();
            $this->addFlash(
                'success',
                'La personne ' . $person->getName()  . ' a été ajoutée à la base de données !'
            );
            return $this->redirectToRoute('backend_person_list');
        }

        return $this->render('backend/show.html.twig', [
            'page_title' => 'Administration - Ajouter une personne',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/person/{id}", name="delete", methods={"DELETE"}, requirements={"id"="\d+"})
     */
    public function delete(Person $person, EntityManagerInterface $em)
    {
        $em->remove($person);
        $em->flush();
        $this->addFlash(
            'success',
            'La personne ' . $person->getName()  . ' a été supprimée de la base de données !'
        );
        return $this->redirectToRoute('backend_person_list');
    }
}
