<?php

namespace App\Entity;

use App\Repository\DataChallengeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DataChallengeRepository::class)]
class DataChallenge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $startDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $endDate = null;

    #[ORM\OneToMany(mappedBy: 'id_challenge', targetEntity: DataProject::class, orphanRemoval: true)]
    private Collection $dataProjects;

    #[ORM\Column(length: 4000)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 10)]
    private ?string $type = null;

    #[ORM\OneToMany(mappedBy: 'id_challenge', targetEntity: ResourcesChallenge::class, orphanRemoval: true)]
    private Collection $resourcesChallenges;

    #[ORM\OneToMany(mappedBy: 'id_challenge', targetEntity: Gestion::class)]
    private Collection $gestions;

    #[ORM\OneToMany(mappedBy: 'id_challenge', targetEntity: Users::class)]
    private Collection $id_gestionnaire;



    public function __construct()
    {
        $this->dataProjects = new ArrayCollection();
        $this->resourcesChallenges = new ArrayCollection();
        $this->id_gestionnaire = new ArrayCollection();
        $this->gestions = new ArrayCollection();
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

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'startDate' => $this->getStartDate(),
            'endDate' => $this->getEndDate(),
            
        ];
    }

    /**
     * @return Collection<int, DataProject>
     */
    public function getDataProjects(): Collection
    {
        return $this->dataProjects;
    }

    public function addDataProject(DataProject $dataProject): self
    {
        if (!$this->dataProjects->contains($dataProject)) {
            $this->dataProjects->add($dataProject);
            $dataProject->setIdChallenge($this);
        }

        return $this;
    }

    public function removeDataProject(DataProject $dataProject): self
    {
        if ($this->dataProjects->removeElement($dataProject)) {
            // set the owning side to null (unless already changed)
            if ($dataProject->getIdChallenge() === $this) {
                $dataProject->setIdChallenge(null);
            }
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, ResourcesChallenge>
     */
    public function getResourcesChallenges(): Collection
    {
        return $this->resourcesChallenges;
    }

    public function addResourcesChallenge(ResourcesChallenge $resourcesChallenge): self
    {
        if (!$this->resourcesChallenges->contains($resourcesChallenge)) {
            $this->resourcesChallenges->add($resourcesChallenge);
            $resourcesChallenge->setIdChallenge($this);
        }

        return $this;
    }

    public function removeResourcesChallenge(ResourcesChallenge $resourcesChallenge): self
    {
        if ($this->resourcesChallenges->removeElement($resourcesChallenge)) {
            // set the owning side to null (unless already changed)
            if ($resourcesChallenge->getIdChallenge() === $this) {
                $resourcesChallenge->setIdChallenge(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Gestion>
     */
    public function getGestions(): Collection
    {
        return $this->gestions;
    }

    public function addGestion(Gestion $gestion): self
    {
        if (!$this->gestions->contains($gestion)) {
            $this->gestions->add($gestion);
            $gestion->setIdChallenge($this);
        }

        return $this;
    }

    public function removeGestion(Gestion $gestion): self
    {
        if ($this->gestions->removeElement($gestion)) {
            // set the owning side to null (unless already changed)
            if ($gestion->getIdChallenge() === $this) {
                $gestion->setIdChallenge(null);
            }
        }

        return $this;
    }
}
