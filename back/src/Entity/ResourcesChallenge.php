<?php

namespace App\Entity;

use App\Repository\ResourcesChallengeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResourcesChallengeRepository::class)]
class ResourcesChallenge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 1000)]
    private ?string $URL = null;

    #[ORM\ManyToOne(inversedBy: 'resourcesChallenges')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DataChallenge $id_challenge = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getURL(): ?string
    {
        return $this->URL;
    }

    public function setURL(string $URL): self
    {
        $this->URL = $URL;

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
}
