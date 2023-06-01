<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
// type user
use App\Entity\TypeUser;

class RegistrationController extends AbstractController
{
    #[Route('/api/register', name: 'app_register', methods: ['POST'])]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): JsonResponse
    {
        $req = json_decode($request->getContent());
        $password = $req ->password;
        $email = $req->email;
        $lastname = $req->lastname;
        $firstname = $req->firstname;
        $schoolCompany = $req->schoolCompagny;
        $creationDate = new \DateTime('now');
        // on vérifie que l'email n'est pas déjà utilisé
        $user = $entityManager->getRepository(Users::class)->findOneBy(['email' => $email]);
        if ($user) {
            return new JsonResponse("Email already used", 400, [], true);
        }
        $user = new Users();
        $user->setEmail($email);
        $user->setPassword($userPasswordHasher->hashPassword($user, $password));
        $user->setLastname($lastname);
        $user->setFirstname($firstname);
        $user->setSchoolCompany($schoolCompany);
        $user->setCreationDate($creationDate);

        $user ->setRoles(['ROLE_STUDENT']);
        $typeUser = $entityManager->getRepository(TypeUser::class)->findOneBy(['name' => 'standard']);
        $entityManager->persist($user);
        $entityManager->flush();
        return new JsonResponse("User created", 200, [], true);
    }
}