<?php

namespace App\Entity;

use App\Repository\GestionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GestionRepository::class)]
class Gestion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'gestions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $id_users = null;

    #[ORM\ManyToOne(inversedBy: 'gestions')]
    private ?DataChallenge $id_challenge = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?Users
    {
        return $this->id_users;
    }

    public function setIdUser(?Users $id_users): self
    {
        $this->id_users = $id_users;

        return $this;
    }

    public function getIdChallenge(): ?DataChallenge
    {
        return $this->id_challenge;
    }

    public function setIdChallenge(?DataChallenge $id_challenge): self
    {
        $this->id_challenge = $id_challenge;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'id_user' => $this->getIdUser()->toArray(),
            'id_challenge' => $this->getIdChallenge()->toArray(),
        ];
    }

    public function toArray2(): ?DataChallenge
    {
        return $this->getIdChallenge()->toArray();
        
    }

    public function getUser(): ?Users
    {
        return $this->getIdUser();
    }
}
