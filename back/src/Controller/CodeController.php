<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CodeEvalRepository;
use App\Entity\CodeEval;
use Symfony\Bundle\SecurityBundle\Security;
use App\Repository\TeamRepository;
use Symfony\Component\HttpFoundation\Request;


class CodeController extends AbstractController
{
    #[Route('api/codes', name: 'get_all_codes', methods: ['GET'])]
    public function getAllCodeEval(CodeEvalRepository $codeEval, Security $security): JsonResponse
    {
        // on verifie que l'utilisateur ai bien le role admin ou gestionnaire
        $user = $security->getUser();
        if($user->hasRole('ROLE_STUDENT')){
            return new JsonResponse('You are not allowed to access this page', 403, [], true);
        }
        $codeEvalList = $codeEval->findAll();
        $data = [];
        for ($i=0; $i < count($codeEvalList); $i++) { 
            $data[$i] = $codeEvalList[$i]->toArray();
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
        
    }

    #[Route('/api/code/team/{id}', name: 'app_codes_team_id', methods: ['GET'])]
    public function getCodeEvalByTeamId(CodeEvalRepository $codeEval, Security $security, $id): JsonResponse
    {
        // on verifie que l'utilisateur ai bien le role admin ou gestionnaire, si c'est un student on verifie qu'il est dans l'équipe
        $user = $security->getUser();
        if($user->hasRole('ROLE_STUDENT')){
            //on vérifie que l'utilisateur est bien dans l'équipe
            if(!$user->isInTeam($id)){
                return new JsonResponse('You are not allowed to access this page', 403, [], true);

            }
        }
        $codeEvalList = $codeEval->findBy(['id_team' => $id]);
        $data = [];
        for ($i=0; $i < count($codeEvalList); $i++) { 
            $data[$i] = $codeEvalList[$i]->toArray();
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
        
    }

    #[Route('/api/code/team', name: 'app_post_code_team_id', methods: ['POST'])]
    public function postCodeEvalByTeamId(TeamRepository $team, EntityManagerInterface $identityManager, Security $security, Request $request): JsonResponse
    {
        // on verifie si l'utilisateur ai bien le role student
        $this->denyAccessUnlessGranted('ROLE_STUDENT');
        $user = $security->getUser();
        $data = json_decode($request->getContent(), true);
        $id = $data['id'];
        if($user->hasRole('ROLE_STUDENT')){
            //on vérifie que l'utilisateur est bien dans l'équipe
            if(!$user->isInTeam($id)){
                return new JsonResponse('You are not allowed to access this page', 403, [], true);

            }
        }

        $teami = $team->findOneBy(['id' => $id]);
        $codeEval = new CodeEval();
        $codeEval->setIdTeam($teami);
        $codeEval->setCode($data['code']);
        $codeEval->setResult($data['result']);
        $identityManager->persist($codeEval);
        $identityManager->flush();
        return new JsonResponse('Code added', 200, [], true);
        
    }

    #[Route('/api/code/team/{id}', name: 'app_get_code_id_team', methods: ['GET'])]
    public function getCodeEvalByID(CodeEvalRepository $codeEval, Security $security, $id): JsonResponse
    {
        //si l'utilisateur est un étudiant on vérifie qu'il est bien dans l'équipe
        $user = $security->getUser();
        if($user->hasRole('ROLE_STUDENT')){
            // on verifie que l'utilisateur est bien dans l'équipe
            if(!$user->isInTeam($id)){
                return new JsonResponse('You are not allowed to access this page', 403, [], true);

            }
        }
        //on récupère le codeEval
        $codeEvalList = $codeEval->findBy(['id' => $id]);
        $data = [];
        //on le transforme en tableau
        for ($i=0; $i < count($codeEvalList); $i++) { 
            $data[$i] = $codeEvalList[$i]->getResult();
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
        
        
    }

    #[Route('/api/code/team', name: 'app_post_code_team', methods: ['PUT'])]
    public function putCodeEvalByTeam(CodeEvalRepository $codeEval, EntityManagerInterface $identityManager, Security $security, Request $request): JsonResponse
    {
        //on récupère l'utilisateur, si c'est un étudiant on vérifie qu'il est bien dans l'équipe
        $user = $security->getUser();
        $data = json_decode($request->getContent(), true);
        $id = $data['id'];
        if($user->hasRole('ROLE_STUDENT')){
            //on vérifie que l'utilisateur est bien dans l'équipe
            if(!$user->isInTeam($id)){
                return new JsonResponse('You are not allowed to access this page', 403, [], true);

            }
        }

        //on verifie pour chaque parametre si il est null, si il ne l'est pas on le modifie
        $code = $codeEval->findOneBy(['id' => $id]);
        if($data['code'] != null){
            $code->setCode($data['code']);
        }
        if($data['result'] != null){
            $code->setResult($data['result']);
        }
        $identityManager->persist($codeEval);
        $identityManager->flush();
        return new JsonResponse('Code modified', 200, [], true);
        
        
    }

    #[Route('/api/code/team/{id}', name: 'app_delete_code_id_team', methods: ['DELETE'])]
    public function deleteCodeEvalByID(CodeEvalRepository $codeEval, EntityManagerInterface $identityManager, Security $security, $id): JsonResponse
    {
        //si l'utilisateur est un étudiant on vérifie qu'il est bien dans l'équipe
        $user = $security->getUser();
        if($user->hasRole('ROLE_STUDENT')){
            // on verifie que l'utilisateur est bien dans l'équipe
            if(!$user->isInTeam($id)){
                return new JsonResponse('You are not allowed to access this page', 403, [], true);

            }
        }
        //on supprime le code
        $codeEvalList = $codeEval->findBy(['id' => $id]);
        $identityManager->remove($codeEvalList[0]);
        $identityManager->flush();
        return new JsonResponse('Code deleted', 200, [], true);
        
        
    }
        

}
    
