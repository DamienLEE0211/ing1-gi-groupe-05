<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UsersRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class TypeUserController extends AbstractController
{

    #[Route('api/userType/admin/users', name: 'app_admin_users', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN', message: 'Only admin can access this resource')]
    public function getUsersByType(UsersRepository $usersrepository): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $userList = $usersrepository->findAll();
        $data = [];
        for ($i=0; $i < count($userList); $i++) { 
            $drole = $userList[$i]->getRoles();
            if($drole[0] == 'ROLE_ADMIN'){
                $data[$i] = $userList[$i]->toArray();
            }
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
        

    }

    #[Route('api/userType/gestionnaire/users', name: 'app_gestionnaire_users', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN', message: 'Only admin can access this resource')]
    public function getUsersByTypeGestionnaire(UsersRepository $usersrepository): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        //  on sélectionne les users ayant le role passé en paramètre sachant qu'il peut y en avoir plusieurs
        $userList = $usersrepository->findAll();
        $data = [];
        for ($i=0; $i < count($userList); $i++) { 
            $drole = $userList[$i]->getRoles();
            if($drole[0] == 'ROLE_GESTIONNAIRE'){
                $data[$i] = $userList[$i]->toArray();
            }
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
        

    }

    #[Route('api/userType/student/users', name: 'app_role_users', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN', message: 'Only admin can access this resource')]
    public function getUsersByTypeStudent(UsersRepository $usersrepository ): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $userList = $usersrepository->findAll();
        $data = [];
        for ($i=0; $i < count($userList); $i++) { 
            $drole = $userList[$i]->getRoles();
            if($drole[0] == 'ROLE_STUDENT'){
                $data[$i] = $userList[$i]->toArray();
            }
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
        

    }
        
}
