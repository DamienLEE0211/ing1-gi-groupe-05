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
    #[Route('api/projects', name: 'app_project', methods: ['GET'])]
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

    #[Route('api/project/{id}', name: 'app_project_id', methods: ['GET'])]
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

    #[Route('api/project/challenge/{id}', name: 'app_project_challenge', methods: ['GET'])]
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


    
}
