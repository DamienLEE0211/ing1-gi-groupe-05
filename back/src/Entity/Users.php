<?php

namespace App\Entity;
use Doctrine\DBAL\Types\Types;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 100)]
    private ?string $lastname = null;

    #[ORM\Column(length: 100)]
    private ?string $firstname = null;

    #[ORM\ManyToMany(targetEntity: Team::class, mappedBy: 'id_user')]
    private Collection $teams;

    #[ORM\Column(length: 255)]
    private ?string $school_company = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $creation_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $deletion_date = null;

    #[ORM\OneToMany(mappedBy: 'id_users', targetEntity: Gestion::class, orphanRemoval: true)]
    private Collection $gestions;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $city = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $study_level = null;


    public function hasRole(string $role): bool
    {
        return in_array($role, $this->getRoles());
    }

    public function isMember(int $id): bool
    {
        foreach ($this->getTeams() as $team) {
            if ($team->getId() === $id) {
                return true;
            }
        }
        return false;
    }
    public function __construct()
    {
        $this->teams = new ArrayCollection();
        $this->gestions = new ArrayCollection();
    }

    public function toString(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }


    public function toArray(): array
    {
        $teams = [];
        foreach ($this->getTeams() as $team) {
            $teams[] = $team->toArray();
        }
        return [
            'id' => $this->getId(),
            'lastname' => $this->getLastname(),
            'firstname' => $this->getFirstname(),
            'email' => $this->getEmail(),
            'school_company' => $this->getSchoolCompany(),
            'creation_date' => $this->getCreationDate(),
            'deletion_date' => $this->getDeletionDate(),
            'role' => $this->getRoles(),
            'city' => $this->getCity(),
            'study_level' => $this->getStudyLevel(),
            'teams' => $teams
        ];
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public function getUsername(): string
    {
        return (string) $this->getUserIdentifier();
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @return Collection<int, Team>
     */
    public function getTeams(): Collection
    {
        return $this->teams;
    }

    public function addTeam(Team $team): self
    {
        if (!$this->teams->contains($team)) {
            $this->teams->add($team);
            $team->addIdUser($this);
        }

        return $this;
    }

    public function removeTeam(Team $team): self
    {
        if ($this->teams->removeElement($team)) {
            $team->removeIdUser($this);
        }

        return $this;
    }

    public function getSchoolCompany(): ?string
    {
        return $this->school_company;
    }

    public function setSchoolCompany(string $school_company): self
    {
        $this->school_company = $school_company;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creation_date;
    }

    public function setCreationDate(\DateTimeInterface $creation_date): self
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    public function getDeletionDate(): ?\DateTimeInterface
    {
        return $this->deletion_date;
    }

    public function setDeletionDate(?\DateTimeInterface $deletion_date): self
    {
        $this->deletion_date = $deletion_date;

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
            $gestion->setIdUser($this);
        }

        return $this;
    }

    public function removeGestion(Gestion $gestion): self
    {
        if ($this->gestions->removeElement($gestion)) {
            // set the owning side to null (unless already changed)
            if ($gestion->getIdUser() === $this) {
                $gestion->setIdUser(null);
            }
        }

        return $this;
    }
    
    public function isInTeam(int $id): bool
    {
        foreach ($this->getTeams() as $team) {
            if ($team->getId() === $id) {
                return true;
            }
        }
        return false;
    }

    public function isInTeamProject(int $id): bool
    {
        foreach ($this->getTeams() as $team) {
            if ($team->getIdProject()->getId() === $id) {
                return true;
            }
        }
        return false;
    }

    public function isLeader(int $id): bool
    {
        foreach ($this->getTeams() as $team) {
            if ($team->getId() === $id) {
                if ($team->getIdLeader() == $this->getId()) {
                    return true;
                }
            }
        }
        return false;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getStudyLevel(): ?string
    {
        return $this->study_level;
    }

    public function setStudyLevel(?string $study_level): self
    {
        $this->study_level = $study_level;

        return $this;
    }


}
