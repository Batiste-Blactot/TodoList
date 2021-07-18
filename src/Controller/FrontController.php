<?php

namespace App\Controller;

use App\Form\ProjectType;
use App\Form\TaskType;
use App\Entity\Project;
use App\Entity\Task;
use App\Repository\TaskRepository;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;

/**
 * Require ROLE_ADMIN for *every* controller method in this class.
 * 
 * @isGranted("IS_AUTHENTICATED_FULLY")
 */
class FrontController extends AbstractController
{
    #[Route('/index', name: 'app_index')]
    public function index(): Response
    {

        $projectRepository = $this->getDoctrine()->getRepository(Project::class);
        $projects = $projectRepository->findBy(
            ['user' => $this->getUser()],
            ['deadline' => 'ASC'],
        );

        return $this->render('front/index.html.twig', [
            'projects' => $projects,
        ]);
    }

    /* Créer un nouveau Projet */
    #[Route('/index/project/new', name: 'app_newProject')]
    public function newProject(Request $request): Response
    {
        $project = new Project();
        $form = $this->createForm(ProjectType::class, $project);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $project->setUser($this->getUser());
            $project->setOpeningDate(new \DateTime());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($project);
            $entityManager->flush();

            return $this->redirectToRoute('app_index');
        }

        return $this->render('front/newProject.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /* Mettre à jour un projet */
    #[Route('/index/project/edit/{id}', name: 'app_updateProject')]
    public function editProject(Request $request, int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $project = $entityManager->getRepository(Project::class)->findOneBy(["id" => $id]);
        $form = $this->createForm(ProjectType::class, $project);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($project);
            $entityManager->flush();

            return $this->redirectToRoute('app_index');
        }

        return $this->render('front/updateProject.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /* Supprimer un projet */
    #[Route('/index/project/delete/{id}', name: "app_deleteProject")]
    public function projectDelete(int $id, ProjectRepository $projectRepository): Response
    {
        $project = $projectRepository->findOneBy([
            "id" => $id,
            "user" => $this->getUser()
        ]);

        if (!$project) {
            $this->addFlash("notice", "Vous essayez de supprimer un projet dont vous n'êtes pas le créateur.");
            return $this->redirectToRoute("app_index");
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($project);
        $entityManager->flush();

        return $this->redirectToRoute('app_index');
    }

    /* Supprimer une tâche */
    #[Route('/index/task/delete/{id}', name: "app_deleteTask")]
    public function TaskDelete(int $id, TaskRepository $taskRepository): Response
    {
        $task = $taskRepository->findOneBy([
            "id" => $id,
        ]);

        if (!$task) {
            $this->addFlash("notice", "La tâche que vous souhaitez supprimer n'existe pas.");
            dd("pas bon");
            return $this->redirectToRoute("app_index");
        }

        if ($task->getProject()->getUser()->getId() !== $this->getUser()->getId()) {
            $this->addFlash("notice", "Vous n'êtes pas le propriétaire du projet dont vous souhaitez supprimer la tâche.");
            dd($task);
            return $this->redirectToRoute("app_index");
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($task);
        $entityManager->flush();

        return $this->redirectToRoute('app_index');
    }

    /* Voir un seul projet */
    #[Route('/index/project/show{id}', name: 'showProject', requirements: ['id' => '\d+'])]
    public function showProject(int $id): Response
    {
        $projectRepository = $this->getDoctrine()->getRepository(Project::class);
        $project = $projectRepository->find($id);

        return $this->render('front/showProject.html.twig', [
            'project' => $project,
        ]);
    }

    /* Voir les tâches d'un projet */
    /* #[Route('index/project/show{id}/task', name: 'showTask', requirements: ['id' => '\d+'])]
    public function showTask(int $id): Response
    {
        $taskRepository = $this->getDoctrine()->getRepository(Task::class);
        $task = $taskRepository->find($id);

        return $this->render('front/showTask.html.twig', [
            'task' => $task,
        ]);
    } */

    /* Ajouter des tâches */
    #[Route('index/project/{projectId}/new', name: 'app_newTask')]
    public function newTask(Request $request, ProjectRepository $projectRepository, int $projectId): Response
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task)
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $task->setRegistered(new \DateTime());
            $project = $projectRepository->find($projectId);
            $project->addTask($task);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($project);
            $entityManager->flush();

            return $this->redirectToRoute('app_index');
        }

        return $this->render('front/newTask.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /* Mettre à jour une tâche */
    #[Route('/index/project/{id}/update', name: 'app_updateTask')]
    public function updateTask(Request $request, int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $task = $entityManager->getRepository(Task::class)->findOneBy(["id" => $id]);
        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('app_index');
        }

        return $this->render('front/updateTask.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
