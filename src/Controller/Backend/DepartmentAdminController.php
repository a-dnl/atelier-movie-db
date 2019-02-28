<?php

namespace App\Controller\Backend;

use App\Entity\Department;
use App\Form\DepartmentType;
use App\Repository\DepartmentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/** @Route("/admin", name="backend_department_") */
class DepartmentAdminController extends AbstractController
{
    /**
     * @Route("/department", name="list", methods={"GET"})
     */
    public function index(DepartmentRepository $departmentRepo)
    {
        $departments = $departmentRepo->findAll();

        return $this->render('backend/department/index.html.twig', [
            'page_title' => 'Liste des departments',
            'departments' => $departments
        ]);
    }

    /**
     * @Route("/department/{id}", name="show", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function show(Department $department, Request $request, EntityManagerInterface $em)
    {    
        $form = $this->createForm(DepartmentType::class, $department);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($department);
            $em->flush();
            $this->addFlash(
                'success',
                'Les informations du département ' . $department->getDptName()  . ' ont été mis à jour !'
            );
        }

        return $this->render('backend/show.html.twig', [
            'page_title' => 'Administration - ' . $department->getDptName(),
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/department", name="add", methods={"POST"})
     */
    public function add(Request $request, EntityManagerInterface $em)
    {
        $department = new Department();

        $form = $this->createForm(DepartmentType::class, $department);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($department);
            $em->flush();
            $this->addFlash(
                'success',
                'Le département ' . $department->getDptName()  . ' a été ajouté à la base de données !'
            );
            return $this->redirectToRoute('backend_department_list');
        }

        return $this->render('backend/show.html.twig', [
            'page_title' => 'Administration - Ajouter un department',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/department/{id}", name="delete", methods={"DELETE"}, requirements={"id"="\d+"})
     */
    public function delete(Department $department, EntityManagerInterface $em)
    {
        $em->remove($department);
        $em->flush();
        $this->addFlash(
            'success',
            'La department ' . $department->getDptName()  . ' a été supprimé de la base de données !'
        );
        return $this->redirectToRoute('backend_department_list');
    }
}
