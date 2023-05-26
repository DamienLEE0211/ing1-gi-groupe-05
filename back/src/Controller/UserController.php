<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    private UserRepository $repository;

    #[Route('/api/users', methods: ['GET'])]
    public function list(): JsonResponse
    {
        $users = $this->repository->findAll();
        return $this->json($users);
    }

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
}