<?php

namespace App\Entity;

use App\Repository\QuizRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuizRepository::class)]
class Quiz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $startDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $endDate = null;

    #[ORM\ManyToOne(inversedBy: 'quizzes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DataProject $id_project = null;

    #[ORM\OneToMany(mappedBy: 'id_quizz', targetEntity: QuizAnswer::class, orphanRemoval: true)]
    private Collection $quizAnswers;

    #[ORM\Column(length: 510)]
    private ?string $question1 = null;

    #[ORM\Column(length: 510)]
    private ?string $question2 = null;

    #[ORM\Column(length: 510)]
    private ?string $question3 = null;

    #[ORM\Column(length: 510)]
    private ?string $question4 = null;

    #[ORM\Column(length: 510 , nullable: true)]
    private ?string $question5 = null;

    public function __construct()
    {
        $this->quizAnswers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

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
            'startDate' => $this->getStartDate(),
            'endDate' => $this->getEndDate(),
            'question1' => $this->getQuestion1(),
            'question2' => $this->getQuestion2(),
            'question3' => $this->getQuestion3(),
            'question4' => $this->getQuestion4(),
            'question5' => $this->getQuestion5(),
            'id_project' => $this->getIdProject(),
        ];
    }

    public function getQuestion1(): ?string
    {
        return $this->question1;
    }

    public function setQuestion1(?string $question1): self
    {
        $this->question1 = $question1;

        return $this;
    }

    public function getQuestion2(): ?string
    {
        return $this->question2;
    }

    public function setQuestion2(?string $question2): self
    {
        $this->question2 = $question2;

        return $this;
    }

    public function getQuestion3(): ?string
    {
        return $this->question3;
    }

    public function setQuestion3(?string $question3): self
    {
        $this->question3 = $question3;

        return $this;
    }

    public function getQuestion4(): ?string
    {
        return $this->question4;
    }

    public function setQuestion4(?string $question4): self
    {
        $this->question4 = $question4;

        return $this;
    }

    public function getQuestion5(): ?string
    {
        return $this->question5;
    }

    public function setQuestion5(?string $question5): self
    {
        $this->question5 = $question5;

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
            $quizAnswer->setIdQuizz($this);
        }

        return $this;
    }

    public function removeQuizAnswer(QuizAnswer $quizAnswer): self
    {
        if ($this->quizAnswers->removeElement($quizAnswer)) {
            // set the owning side to null (unless already changed)
            if ($quizAnswer->getIdQuizz() === $this) {
                $quizAnswer->setIdQuizz(null);
            }
        }

        return $this;
    }



}
