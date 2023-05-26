<?php

namespace App\Model;

class User {
    private string $username;
    private int $age;
    private string $id;

    /**
     * @param string $username
     * @param int $age
     * @param string $id
     */
    public function __construct(string $username, int $age, string $id)
    {
        $this->username = $username;
        $this->age = $age;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }
}