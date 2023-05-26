<?php

namespace App\Repository;

use App\Model\User;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\EntityManagerInterface;

class UserRepository
{
    private EntityManagerInterface $manager;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @return User[]
     * @throws Exception
     */
    public function findAll(): array
    {
        $connection = $this->manager->getConnection();
        try {
            $connection->beginTransaction();
            $result = $connection->executeQuery("SELECT id, username, age FROM users")->fetchAllAssociative();
            $connection->commit();
            return array_map(function ($user) {
                return new User($user['username'], $user['age'], $user['id']);
            }, $result);
        } catch (Exception $e) {
            $connection->rollBack();
            return array();
        }
    }
}