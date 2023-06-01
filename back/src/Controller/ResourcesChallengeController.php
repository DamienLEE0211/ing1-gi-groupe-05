<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ResourcesChallengeRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\ResourcesChallenge;


class ResourcesChallengeController extends AbstractController
{
    #[Route('api/resourceschallenges', name: 'app_get_all_resources_challenge' , methods: ['GET'])]
    public function getAllResourcesChallenge(ResourcesChallengeRepository $resourcesChallenge): JsonResponse
    {
        $resourcesChallengeList = $resourcesChallenge->findAll();
        $data = [];
        for ($i=0; $i < count($resourcesChallengeList); $i++) { 
            $data[$i] = $resourcesChallengeList[$i]->toArray();
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
        
    }

    #[Route('api/resourceschallenge/{id}', name: 'app_resources_challenge_id', methods: ['GET'])]
    public function getResourcesChallengeById(ResourcesChallengeRepository $resourcesChallenge, $id): JsonResponse
    {
        $resourcesChallengeList = $resourcesChallenge->findBy(['id' => $id]);
        $data = [];
        for ($i=0; $i < count($resourcesChallengeList); $i++) { 
            $data[$i] = $resourcesChallengeList[$i]->toArray();
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
        
    }

    #[Route('api/resourceschallenge/challenge/{id}', name: 'app_resources_challenge_challenge_id', methods: ['GET'])]
    public function getResourcesChallengeByChallengeId(ResourcesChallengeRepository $resourcesChallenge, $id): JsonResponse
    {
        $resourcesChallengeList = $resourcesChallenge->findBy(['id_challenge' => $id]);
        $data = [];
        for ($i=0; $i < count($resourcesChallengeList); $i++) { 
            $data[$i] = $resourcesChallengeList[$i]->toArray();
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
        
    }

    #[Route('api/resourceschallenge', name: 'app_resources_challenge_post', methods: ['POST'])]
    public function postResourcesChallenge(ResourcesChallengeRepository $resourcesChallenge, Security $security, Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $user = $security->getUser();
        if(!$user->hasRole('ROLE_STUDENT')){
            return new JsonResponse("Vous n'avez pas accès à cette ressource", 403, [], true);
        }
        $data = json_decode($request->getContent(), true);
        $ressourceChallenge = new ResourcesChallenge();
        $ressourceChallenge->setURL($data['URL']);
        $ressourceChallenge->setIdChallenge($data['id_challenge']);
        $ressourceChallenge->setName($data['name']);
        $entityManager->persist($ressourceChallenge);
        $entityManager->flush();


        return new JsonResponse("Ressource ajoutée", 201, [], true);
    }

    #[Route('api/resourceschallenge/{id}', name: 'app_resources_challenge_delete', methods: ['DELETE'])]
    public function deleteResourcesChallenge(ResourcesChallengeRepository $resourcesChallenge, Security $security, Request $request, EntityManagerInterface $entityManager, $id): JsonResponse
    {
        $user = $security->getUser();
        if(!$user->hasRole('ROLE_STUDENT')){
            return new JsonResponse("Vous n'avez pas accès à cette ressource", 403, [], true);
        }
        $ressourceChallenge = $resourcesChallenge->find($id);
        $entityManager->remove($ressourceChallenge);
        $entityManager->flush();
        return new JsonResponse("Ressource supprimée", 200, [], true);
    }
}
