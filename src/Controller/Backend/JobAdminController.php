<?php

namespace App\Controller\Backend;

use App\Entity\Job;
use App\Form\JobType;
use App\Repository\JobRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/** @Route("/admin", name="backend_job_") */
class JobAdminController extends AbstractController
{
    /**
     * @Route("/job", name="list", methods={"GET"})
     */
    public function index(JobRepository $jobRepo)
    {
        $jobs = $jobRepo->findAll();

        return $this->render('backend/job/index.html.twig', [
            'page_title' => 'Liste des métiers',
            'jobs' => $jobs
        ]);
    }

    /**
     * @Route("/job/{id}", name="show", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function show(Job $job, Request $request, EntityManagerInterface $em)
    {    
        $form = $this->createForm(JobType::class, $job);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($job);
            $em->flush();
            $this->addFlash(
                'success',
                'Les informations du métier ' . $job->getJobName()  . ' ont été mise à jour !'
            );
        }

        return $this->render('backend/show.html.twig', [
            'page_title' => 'Administration - ' . $job->getJobName(),
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/job", name="add", methods={"POST"})
     */
    public function add(Request $request, EntityManagerInterface $em)
    {
        $job = new Job();

        $form = $this->createForm(JobType::class, $job);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($job);
            $em->flush();
            $this->addFlash(
                'success',
                'La métier ' . $job->getJobName()  . ' a été ajoutée à la base de données !'
            );
            return $this->redirectToRoute('backend_job_list');
        }

        return $this->render('backend/show.html.twig', [
            'page_title' => 'Administration - Ajouter un métier',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/job/{id}", name="delete", methods={"DELETE"}, requirements={"id"="\d+"})
     */
    public function delete(Job $job, EntityManagerInterface $em)
    {
        $em->remove($job);
        $em->flush();
        $this->addFlash(
            'success',
            'La métier ' . $job->getJobName()  . ' a été supprimé de la base de données !'
        );
        return $this->redirectToRoute('backend_job_list');
    }
}
