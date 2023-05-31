<?php

namespace App\Controller;

use App\Repository\TeamRepository;
use App\Entity\Team;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use  Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UsersRepository;

class TeamController extends AbstractController
{
    #[Route('api/teams', name: 'app_get_all_team', methods: ['GET'])]
    public function getAllTeam(TeamRepository $team,Security $security): JsonResponse
    {
        $user = $security->getUser();
        if($user->hasRole('ROLE_STUDENT')){
            return new JsonResponse("Vous n'avez pas accès à cette ressource", 403, [], true);
        }
        $teamList = $team->findAll();
        $data = [];
        for ($i=0; $i < count($teamList); $i++) { 
            $data[$i] = $teamList[$i]->toArray();
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
        
    }

    #[Route('api/team/{id}', name: 'app_get_eam_by_id', methods: ['GET'])]
    public function getTeamById(TeamRepository $team, $id , Security $security): JsonResponse
    {   
        $user = $security->getUser();

        if(!$user->hasRole('ROLE_ADMIN')){
            
            if($user->isMember($id)){
                $teamList = $team->findBy(['id' => $id]);
                $data = [];
                for ($i=0; $i < count($teamList); $i++) { 
                    $data[$i] = $teamList[$i]->toArray();
                }
                $data = json_encode($data);
                return new JsonResponse($data, 200, [], true);
            }
        } else {
            $teamList = $team->findBy(['id' => $id]);
            $data = [];
            for ($i=0; $i < count($teamList); $i++) { 
                $data[$i] = $teamList[$i]->toArray();
            }
            $data = json_encode($data);
            return new JsonResponse($data, 200, [], true);
        }

        return new JsonResponse("Vous n'avez pas accès à cette ressource", 403, [], true);
      
        
    }

    #[Route('api/team/{id}/members', name: 'app_get_team_members_by_id', methods: ['GET'])]
    public function getTeamMembers(TeamRepository $team, $id, Security $security): JsonResponse
    {
        $user = $security->getUser();
        $team1 = $team->findBy(['id' => $id]);
        if(!$user->hasRole('ROLE_ADMIN')){
            
            if($user->isMember($id)){
                $members = $team1[0]->getIdUser();
                $data = [];
                for ($i=0; $i < count($members); $i++) { 
                    $data[$i] = $members[$i]->toArray();
                }
                $data = json_encode($data);
                return new JsonResponse($data, 200, [], true);
            }
        } else {
            $members = $team1[0]->getIdUser();
            $data = [];
            for ($i=0; $i < count($members); $i++) { 
                $data[$i] = $members[$i]->toArray();
            }
            $data = json_encode($data);
            return new JsonResponse($data, 200, [], true);
        }
        return new JsonResponse("Vous n'avez pas accès à cette ressource", 403, [], true);
        
    }

    #[Route('api/team/create', name: 'app_team_create', methods: ['POST'])]
    public function createTeam(TeamRepository $team, Security $security, $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_STUDENT');
        $user = $security->getUser();
        $data = json_decode($request->getContent(), true);
        $team1 = new Team();
        $team1->setName($data['name']);
        $team1->addIdUser($user);
        $id_project = $data['id_project'];
        // on verifie que le projet existe et si l'utilisateur n'est pas déjà dans une team pour ce projet et si il a bien le role student
        if( $user->isInTeam($id_project) == false && $user->isInTeamProject($id_project) == false){
            $team1->setIdProject($id_project);
            $entityManager->persist($team1);
            $entityManager->flush();
            return new JsonResponse("Team created", 200, [], true);
        }
        return new JsonResponse("Vous n'avez pas accès à cette ressource", 403, [], true);
        
    }

    #[Route('api/team/currentuser', name: 'app_team_currentuser', methods: ['GET'])]
    public function getTeamCurrentUser(TeamRepository $team, Security $security): JsonResponse
    {
        $user = $security->getUser();
        $team1 = $team->findBy(['id_user' => $user->getId()]);
        $data = [];
        for ($i=0; $i < count($team1); $i++) { 
            $data[$i] = $team1[$i]->toArray();
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
        
    }

    #[Route('api/team/{name}/{mail}/add', name: 'app_team_add', methods: ['POST'])]
    public function addMemberTeam(TeamRepository $team, Security $security, $mail, $name, UsersRepository $userrepo, EntityManagerInterface $entityManager): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_STUDENT');
        $user = $security->getUser();
        $team1 = $team->findOneBy(['name' => $name]);
        $user1 = $userrepo->findOneBy(['email' => $mail]);
        $id_project = $team1->getIdProject()->getId();
        // on verifie que le projet existe et si l'utilisateur n'est pas déjà dans une team pour ce projet et si il a bien le role student
        if( $user->isInTeam($id_project) == false && $user->isInTeamProject($id_project) == false){
            $team1->addIdUser($user1);
            $entityManager->persist($team1);
            $entityManager->flush();
            return new JsonResponse("User added", 200, [], true);
        }
        return new JsonResponse("Vous n'avez pas accès à cette ressource", 403, [], true);
    }

    #[Route('api/team/{id}/delete', name: 'app_team_delete', methods: ['DELETE'])]
    public function deleteTeam(TeamRepository $team, Security $security, $id, EntityManagerInterface $entityManager): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_STUDENT');
        $user = $security->getUser();
        $team1 = $team->findOneBy(['id' => $id]);
        $id_project = $team1->getIdProject();
        // on verifie que l'utilisateur est le leader de la team 
        if( $user->isLeader($id) == true){
            $entityManager->remove($team1);
            $entityManager->flush();
            return new JsonResponse("Team deleted", 200, [], true);
        }
        return new JsonResponse("Vous n'avez pas accès à cette ressource", 403, [], true);
    }

}
