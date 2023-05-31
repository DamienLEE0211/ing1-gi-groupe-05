<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'teams')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DataProject $id_project = null;

    #[ORM\ManyToMany(targetEntity: Users::class, inversedBy: 'teams')]
    private Collection $id_user;

    #[ORM\OneToMany(mappedBy: 'id_team', targetEntity: QuizAnswer::class, orphanRemoval: true)]
    private Collection $quizAnswers;

    #[ORM\ManyToOne]
    private ?Users $id_leader = null;

    public function __construct()
    {
        $this->id_user = new ArrayCollection();
        $this->quizAnswers = new ArrayCollection();
    }

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
            'name' => $this->getName(),
            'id_project' => $this->getIdProject()->getId(),
            'id_leader' => $this->getIdLeader()->getId(),
        ];
    }

    /**
     * @return Collection<int, Users>
     */
    public function getIdUser(): Collection
    {
        return $this->id_user;
    }

    public function addIdUser(Users $idUser): self
    {
        if (!$this->id_user->contains($idUser)) {
            $this->id_user->add($idUser);
        }

        return $this;
    }

    public function removeIdUser(Users $idUser): self
    {
        $this->id_user->removeElement($idUser);

        return $this;
    }

    /**
     * @return Collection<int, QuizAnswer>
     */
    public function getQuizAnswers(): Collection
    {
        return $this->quizAnswers;
    }

    public function addQuizAnswer(QuizAnswer $quizAnswer): self
    {
        if (!$this->quizAnswers->contains($quizAnswer)) {
            $this->quizAnswers->add($quizAnswer);
            $quizAnswer->setIdTeam($this);
        }

        return $this;
    }

    public function removeQuizAnswer(QuizAnswer $quizAnswer): self
    {
        if ($this->quizAnswers->removeElement($quizAnswer)) {
            // set the owning side to null (unless already changed)
            if ($quizAnswer->getIdTeam() === $this) {
                $quizAnswer->setIdTeam(null);
            }
        }

        return $this;
    }

    public function getIdLeader(): ?Users
    {
        return $this->id_leader;
    }

    public function setIdLeader(?Users $id_leader): self
    {
        $this->id_leader = $id_leader;

        return $this;
    }
}
