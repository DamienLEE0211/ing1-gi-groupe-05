<?php

namespace App\Controller;

use App\Repository\ResourcesRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;


class ResourcesController extends AbstractController
{
    #[Route('api/resources', name: 'app_resources', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN', message: 'Only admins can access this resource')]
    public function getAllResources(ResourcesRepository $resources): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $resourcesList = $resources->findAll();
        $data = [];
        for ($i=0; $i < count($resourcesList); $i++) { 
            $data[$i] = $resourcesList[$i]->toArray();
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
        
    }

    #[Route('api/resource/{id}', name: 'app_resources_id', methods: ['GET'])]
    public function getResourcesById(ResourcesRepository $resources, $id): JsonResponse
    {
        $resourcesList = $resources->findBy(['id' => $id]);
        if ($resourcesList) {
            $data = [];
            for ($i=0; $i < count($resourcesList); $i++) { 
                $data[$i] = $resourcesList[$i]->toArray();
            }
            $data = json_encode($data);
            return new JsonResponse($data, 200, [], true);
        } else {
            return new JsonResponse("Ressource non trouvée", 404, [], true);
        }
        
    }

    #[Route('api/resource/project/{projetId}', name: 'app_resources_id', methods: ['GET'])]
    public function getResourcesByProjetId(ResourcesRepository $resources, $projetId): JsonResponse
    {
        $resourcesList = $resources->findBy(['projetId' => $projetId]);
        $data = [];
        for ($i=0; $i < count($resourcesList); $i++) { 
            $data[$i] = $resourcesList[$i]->toArray();
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
        
    }

    #[Route('api/resource', name: 'app_resources_post', methods: ['POST'])]
    public function postResources(ResourcesRepository $resources, Security $security, Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $user = $security->getUser();
        if(!$user->hasRole('ROLE_STUDENT')){
            return new JsonResponse("Vous n'avez pas accès à cette ressource", 403, [], true);
        }
        $data = json_decode($request->getContent(), true);
        $resource = new Resources();
        $resource->setIdProject($data['idProject']);
        $resource->setURL($data['url']);
        $entityManager->persist($resource);
        $entityManager->flush();
        return new JsonResponse("Ressource ajoutée", 201, [], true);
    }

    #[Route('api/resource/{id}', name: 'app_resources_delete', methods: ['DELETE'])]
    public function deleteResources(ResourcesRepository $resources, $id, EntityManagerInterface $entityManager, Security $security): JsonResponse
    {
        $user = $security->getUser();
        if($user->hasRole('ROLE_STUDENT')){
            return new JsonResponse("Vous n'avez pas accès à cette ressource", 403, [], true);
        }
        $resources = $resources->findOneBy(['id' => $id]);
        if ($resources) {
            $entityManager->remove($resources);
            $entityManager->flush();
            return new JsonResponse("Ressource supprimée", 200, [], true);
        } else {
            return new JsonResponse("Ressource non trouvée", 404, [], true);
        }
    }

}
