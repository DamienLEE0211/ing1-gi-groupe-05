<?php

namespace App\Entity;

use App\Repository\QuizAnswerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuizAnswerRepository::class)]
class QuizAnswer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 65535)]
    private ?string $answer1 = null;

    #[ORM\Column(length: 65535)]
    private ?string $answer2 = null;

    #[ORM\Column(length: 65535)]
    private ?string $answer3 = null;

    #[ORM\Column(length: 65535)]
    private ?string $answer4 = null;

    #[ORM\Column(length: 65535)]
    private ?string $answer5 = null;

    #[ORM\ManyToOne(inversedBy: 'quizAnswers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Quiz $id_quizz = null;

    #[ORM\ManyToOne(inversedBy: 'quizAnswers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Team $id_team = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnswer1(): ?string
    {
        return $this->answer1;
    }

    public function setAnswer1(string $answer1): self
    {
        $this->answer1 = $answer1;

        return $this;
    }

    public function getAnswer2(): ?string
    {
        return $this->answer2;
    }

    public function setAnswer2(string $answer2): self
    {
        $this->answer2 = $answer2;

        return $this;
    }

    public function getAnswer3(): ?string
    {
        return $this->answer3;
    }

    public function setAnswer3(string $answer3): self
    {
        $this->answer3 = $answer3;

        return $this;
    }

    public function getAnswer4(): ?string
    {
        return $this->answer4;
    }

    public function setAnswer4(string $answer4): self
    {
        $this->answer4 = $answer4;

        return $this;
    }

    public function getAnswer5(): ?string
    {
        return $this->answer5;
    }

    public function setAnswer5(string $answer5): self
    {
        $this->answer5 = $answer5;

        return $this;
    }

    public function getIdQuizz(): ?Quiz
    {
        return $this->id_quizz;
    }

    public function setIdQuizz(?Quiz $id_quizz): self
    {
        $this->id_quizz = $id_quizz;

        return $this;
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

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'answer1' => $this->getAnswer1(),
            'answer2' => $this->getAnswer2(),
            'answer3' => $this->getAnswer3(),
            'answer4' => $this->getAnswer4(),
            'answer5' => $this->getAnswer5(),
            'id_quizz' => $this->getIdQuizz()->getId(),
            'id_team' => $this->getIdTeam()->getId(),
        ];
    }
}
