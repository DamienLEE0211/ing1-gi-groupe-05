<?php

namespace App\Entity;

use App\Repository\ResourcesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResourcesRepository::class)]
class Resources
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $URl = null;

    #[ORM\ManyToOne(inversedBy: 'resources')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DataProject $id_project = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getURL(): ?string
    {
        return $this->URl;
    }

    public function setURL(string $URl): self
    {
        $this->URl = $URl;

        return $this;
    }

    public function getIdProject(): ?DataProject
    {
        return $this->id_project;
    }

    public function setIdProject(?DataProject $id_project): self
    {
        $this->id_project = $id_project;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'URl' => $this->getURl(),
            'id_project' => $this->getIdProject(),
        ];
    }
}
