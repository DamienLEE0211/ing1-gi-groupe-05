<?php

namespace App\Entity;

use App\Repository\CodeEvalRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CodeEvalRepository::class)]
class CodeEval
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'codeEvals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Team $id_team = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $code = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $result = null;

    public function toArray(): array
    {
        $data = [
            'id' => $this->getId(),
            'id_team' => $this->getIdTeam()->getId(),
            'code' => $this->getCode(),
        ];
        return $data;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTeam(): ?Team
    {
        return $this->id_team;
    }

    public function setIdTeam(?Team $id_team): self
    {
        $this->id_team = $id_team;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getResult(): ?string
    {
        return $this->result;
    }

    public function setResult(?string $result): self
    {
        $this->result = $result;

        return $this;
    }
}
