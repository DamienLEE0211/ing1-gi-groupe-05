<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\GestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Gestion;

class GestionnaireController extends AbstractController
{
    #[Route('/api/gestionnaires', name: 'get_all_gestionnaires', methods: ['GET'])]
    public function getAllGestionnaire(GestionRepository $gestionnaire): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $gestionnaireList = $gestionnaire->findAll();
        $data = [];
        foreach ($gestionnaireList as $gestionnaire) {
            $user = $gestionnaire->getIdUser();
            $challenge = $gestionnaire->getIdChallenge();
            $data[] = [
                'id' => $gestionnaire->getId(),
                'id_user' => $user->toArray(),
                'id_challenge' => $challenge->toArray(),
            ];
            
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
    }

    #[Route('/api/gestionnaire/user/{id}', name: 'get_one_gestionnaire', methods: ['GET'])]
    public function getOneGestionnaire(GestionRepository $gestionnaire, $id, Security $security): JsonResponse
    {
        // si l'utilisateur est un student 
        if($security->getUser()->hasRole('ROLE_STUDENT')){
            return new JsonResponse("Vous n'avez pas accès à cette ressource", 403, [], true);
        }
        $gestionnaire = $gestionnaire->findOneBy(['id_users' => $id]);
        $challenge = $gestionnaire->getIdChallenge();
        $data = [
            'id' => $gestionnaire->getId(),
            'id_challenge' => $challenge->toArray(),
        ];
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
    }

    #[Route('/api/gestionnairecurrentuser', name: 'app_get_all_gestion_current_user', methods: ['GET'])]

    public function getOneGestionnaireCurrent(GestionRepository $gestionnaire, Security $security): JsonResponse
    {
        $user = $security->getUser();
        // on verifie que l'utilisateur est bien un gestionnaire
        if(!$user->hasRole('ROLE_GESTIONNAIRE')){
            return new JsonResponse("Vous n'avez pas accès à cette ressource", 403, [], true);
        }
        $gestionnaire = $gestionnaire->findBy(['id_user' => $user->getId()]);
        foreach ($gestionnaire as $gestionnaire1) {
            $data[] = $gestionnaire1->toArray2();
            
        }
        return new JsonResponse($data, 200, [], true);
    }

    //supprimer un gestionnaire
    #[Route('/api/gestionnaire/{id}', name: 'gestionnaire_delete', methods: ['DELETE'])]

    public function deleteGestionnaire(GestionRepository $gestionnaire, $id, EntityManagerInterface $entityManager): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $gestionnaire = $gestionnaire->findOneBy(['id' => $id]);
        if ($gestionnaire) {
            $entityManager->remove($gestionnaire);
            $entityManager->flush();
            $data = json_encode("Gestionnaire deleted");
        }
        else {
            $data = json_encode("Gestionnaire not found");
        }
        return new JsonResponse($data, 200, [], true);
    }

    //ajouter un gestionnaire
    #[Route('/api/gestionnaire', name: 'gestionnaire_post', methods: ['POST'])]

    public function postGestionnaire(Security $security, Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $data = json_decode($request->getContent(), true);
        $gestionnaire = new Gestion();
        $gestionnaire->setIdUser($data['id_user']);
        $gestionnaire->setIdChallenge($data['id_challenge']);
        $entityManager->persist($gestionnaire);
        $entityManager->flush();

        return new JsonResponse($data, 200, [], true);
    }



}
