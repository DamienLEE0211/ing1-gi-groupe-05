<?php

namespace App\Controller;


use App\Repository\DataProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\DataProject;

class ProjectController extends AbstractController
{
    #[Route('api/projects', name: 'app_get_all_projects', methods: ['GET'])]
    public function getAllProject(DataProjectRepository $project): JsonResponse
    {
        $projectList = $project->findAll();
        $data = [];
        for ($i=0; $i < count($projectList); $i++) { 
            $data[$i] = $projectList[$i]->toArray();
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);

    }

    #[Route('api/project/{id}', name: 'app_get_project_by_id', methods: ['GET'])]
    public function getProjectById(DataProjectRepository $project, int $id): JsonResponse
    {
        $projectL = $project->find($id);
        $data = $projectL->toArray();
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);

    }

    #[Route('api/project', name: 'app_project_post', methods: ['POST'])]
    public function postProject(DataProjectRepository $project, Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $project = new DataProject();
        $project->setName($data['name']);
        $project->setDescription($data['description']);
        $project->setImage($data['image']);
        $project->setContact($data['contact']);
        $entityManager->persist($project);
        $entityManager->flush();
        return new JsonResponse("Projet créé", 201, [], true);
    }

    #[Route('api/project/challenge/{id}', name: 'app_get_all_projetcs_by_challenge_id', methods: ['GET'])]
    public function getProjectByChallengeId(DataProjectRepository $project, int $id): JsonResponse
    {
        $projectList = $project->findBy(['challengeId' => $id]);
        $data = [];
        for ($i=0; $i < count($projectList); $i++) { 
            $data[$i] = $projectList[$i]->toArray();
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);

    }

    #[Route('api/project/{id}', name: 'app_project_delete', methods: ['DELETE'])]
    public function deleteProject(DataProjectRepository $project, int $id, EntityManagerInterface $entityManager): JsonResponse
    {
        $project = $project->find($id);
        $entityManager->remove($project);
        $entityManager->flush();
        return new JsonResponse("Projet supprimé", 200, [], true);
    }

    #[Route('api/project/{name}', name: 'app_get_projet_by_name', methods: ['GET'])]
    public function getProjectByName(DataProjectRepository $project, string $name): JsonResponse
    {
        $projectList = $project->findBy(['name' => $name]);
        $data = [];
        for ($i=0; $i < count($projectList); $i++) { 
            $data[$i] = $projectList[$i]->toArray();
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);

    }

    #[Route('api/project/{id}', name: 'app_project_put', methods: ['PUT'])]
    public function putProject(DataProjectRepository $project, int $id, Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $project = $project->find($id);
        empty($data['name']) ? true : $project->setName($data['name']);
        empty($data['description']) ? true : $project->setDescription($data['description']);
        empty($data['image']) ? true : $project->setImage($data['image']);
        empty($data['contact']) ? true : $project->setContact($data['contact']);
        $entityManager->persist($project);
        $entityManager->flush();
        return new JsonResponse("Projet modifié", 200, [], true);
    }


    
}
