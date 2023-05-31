<?php

namespace App\Controller;

use App\Repository\DataChallengeRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\DataChallenge;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class DataChallengeController extends AbstractController 
{
    #[Route('api/challenges', name: 'app_data_challenge', methods: ['GET'])]
    public function getAllChallenge(DataChallengeRepository $challenge): JsonResponse
    {
        $challengeList = $challenge->findAll();
        $data = [];
        for ($i=0; $i < count($challengeList); $i++) { 
            $data[$i] = $challengeList[$i]->toArray();
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
        
    }

    #[Route('api/challenge/{id}', name: 'app_data_challenge_id', methods : ['GET']) ]

    public function getChallengeById(DataChallengeRepository $challenge, $id): JsonResponse
    {
        $challengeList = $challenge->findBy(['id' => $id]);
        $data = [];
        for ($i=0; $i < count($challengeList); $i++) { 
            $data[$i] = $challengeList[$i]->toArray();
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
        
    }

    #[Route('api/challenge', name: 'app_data_challenge_post', methods: ['POST'])]
    public function postChallenge(DataChallengeRepository $challengeRepo, Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $this -> denyAccessUnlessGranted('ROLE_ADMIN');
        $challenge = new DataChallenge();
        $data = json_decode($request->getContent(), true);
        // on verifie que le nom du challenge n'existe pas déjà
        $challengeList = $challengeRepo->findBy(['name' => $data['name']]);
        if ($challengeList) {
            return new JsonResponse("Ce challenge existe déjà", 409, [], true);
        }
        $challenge->setName($data['name']);
        $challenge->setDescription($data['description']);
        $challenge->setStartDate($data['startDate']);
        $challenge->setEndDate($data['endDate']);
        $challenge->setImage($data['image']);
        $challenge->setType($data['type']);
        $challengeRepo->save($challenge);
        $entityManager->flush();
        return new JsonResponse("Challenge créé", 200, [], true);
    }

    #[Route('api/challenge/{id}', name: 'app_data_challenge_delete', methods: ['DELETE'])]
    public function deleteChallenge(DataChallengeRepository $challengeRepo, $id, EntityManagerInterface $entityManager): JsonResponse
    {
        $this -> denyAccessUnlessGranted('ROLE_ADMIN');
        $challenge = $challengeRepo->findOneBy(['id' => $id]);
        if ($challenge) {
            $challengeRepo->remove($challenge);
            $entityManager->flush();
            return new JsonResponse("Challenge supprimé", 200, [], true);
        } else {
            return new JsonResponse("Challenge non trouvé", 404, [], true);
        }
    }

}
