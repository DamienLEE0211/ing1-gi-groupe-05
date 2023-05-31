<?php

namespace App\Controller;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use  Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManagerInterface;


class UsersController extends AbstractController
{
    #[Route('api/users', name: 'app_users', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN', message: 'Only admins can access this resource', methods : ['GET'])]
    public function getAllUsers(UsersRepository $usersrepository, SerializerInterface $serializer ): JsonResponse 
    {
        // on utilise isGranted pour vérifier que l'utilisateur a bien le role admin
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $usersList = $usersrepository->findAll();
        $data = [];
        foreach ($usersList as $user) {
            $data[] = $user->toArray();
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
    }



    #[Route('api/currentuser', name: 'app_users_current', methods: ['GET'])]
    public function getCurrentUser(UsersRepository $usersrepository, SerializerInterface $serializer, Security $security): JsonResponse
    {

        $user = $security->getUser();
        if ($user) {
            $data = $user->toArray();
            $data = json_encode($data);
        }
        else {
            $data = json_encode("User not found");
        }
        return new JsonResponse($data, 200, [], true);

    }

    #[Route('api/user', name: 'app_users_create', methods: ['POST'])]
    #[IsGranted('ROLE_ADMIN', message: 'Only admin can access this resource')]
    public function createUser(UsersRepository $usersrepository, Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $data = json_decode($request->getContent());
        $email = $data->email;

        // on vérifie que l'email n'est pas déjà utilisé
        $user = $usersrepository->findOneBy(['email' => $data->email]);
        if ($user) {
            return new JsonResponse("Email already used", 400, [], true);
        }
        $user = new Users();
        $user->setEmail($email);
        $user->setPassword($data->password);
        $user->setLastname($data->lastname);
        $user->setFirstname($data->firstname);
        $user->setSchoolCompany($data->schoolCompany);
        $user->setCreationDate(new \DateTime('now'));
        $user->setRoles([$data->roles]);
        $usersrepository->save($user, true);
        $entityManager->persist($user);
        $entityManager->flush();

        return new JsonResponse('User created', 201, [], true);

    }

    #[Route('api/user/{id}', name: 'app_users_update', methods: ['PUT'])]
    #[IsGranted('ROLE_ADMIN', message: 'Only admins can access this resource')]
    public function updateUser(UsersRepository $usersrepository, SerializerInterface $serializer, Request $request, int $id): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $user = $usersrepository->find($id);
        $data = $request->getContent();
        $serializer->deserialize($data, Users::class, 'json', ['object_to_populate' => $user]);
        $usersrepository->save($user, true);
        return new JsonResponse('User updated', 200, [], true);

    }

    #[Route('api/user', name: 'app_users_delete', methods: ['DELETE'])]
    #[IsGranted('ROLE_ADMIN', message: 'Only admins can access this resource')]
    public function deleteUser(UsersRepository $usersrepository, Request $request): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $data = json_decode($request->getContent());
        $id = $data->id;
        $email = $data->email;
        if(!$id && !$email){
            return new JsonResponse('Missing parameters', 400, [], true);
        }else if($id && !$email){
            $user = $usersrepository->find($id);
        }else if(!$id && $email){
            $user = $usersrepository->findOneBy(['email' => $email]);
        }

        if ($user) {
            $usersrepository->remove($user, true);
            return new JsonResponse('User deleted', 200, [], true);
        }
        else {
            return new JsonResponse('User not found', 404, [], true);
        }
    }

    #[Route('api/currentuser/team', name: 'app_users_team', methods: ['GET'])]
    public function getTeam(UsersRepository $usersrepository, Security $security): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_STUDENT');
        $user = $security->getUser();
        $team = $user->getTeams();
        for ($i = 0; $i < count($team); $i++) {
            $data[] = $team[$i]->toArray();
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);

    }

    // les gestionnaires
    #[Route('api/user/gestionnaire', name: 'app_gestionnaires', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN', message: 'Only admins can access this resource')]
    public function getAllGestionnaire(UsersRepository $usersrepository, SerializerInterface $serializer): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $gestionnaireList = $usersrepository->findAll();
        $data = [];
        foreach ($gestionnaireList as $gestionnaire) {
            $gestionlist = $gestionnaire->getGestions();
            foreach ($gestionlist as $gestion) {
                $data[] = $gestion->toArray();
            }
        }
        $data = json_encode($data);
        return new JsonResponse($data, 200, [], true);
    }
    #[Route('api/user/{id}', name: 'app_users_id', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN', message: 'Only users can access this resource')]
    public function getOneUser(UsersRepository $usersrepository, SerializerInterface $serializer, int $id, Security $security): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $user = $usersrepository->find($id);
        if ($user) {
            $data = $user->toArray();
            $data = json_encode($data);
        }
        else {
            $data = json_encode("User not found");
        }
        return new JsonResponse($data, 200, [], true);

    }


}
