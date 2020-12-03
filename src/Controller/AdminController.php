<?php

namespace App\Controller;

use App\Entity\Project;
use App\Form\ProjectType;
use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminController
 * @package App\Controller
 * @Route("/admin", name="admin_")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/project/new", name="project_new")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $project = new Project();
        $form    = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($project);
            $entityManager->flush();
            return $this->redirectToRoute('admin_project_all');
        }
        return $this->render('admin/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/project/all", name="project_all")
     */
    public function all(ProjectRepository $projectRepository)
    {
        return $this->render('admin/all.html.twig', [
            'projects' => $projectRepository->findAll(),
        ]);
    }

    /**
     * @Route("/project/update/{id}", name="project_update")
     */
    public function update(
        Project $project,
        Request $request,
        EntityManagerInterface $entityManager
    )
    {
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute('admin_project_all');
        }
        return $this->render('admin/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/project/delete/{id}", name="project_delete")
     */
    public function delete(Project $project, EntityManagerInterface $entityManager)
    {
        $entityManager->remove($project);
        $entityManager->flush();
        return $this->redirectToRoute('admin_project_all');
    }
}
