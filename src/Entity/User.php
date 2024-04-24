<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    private ?string $firsName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pseudo = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Comment $comments = null;

    #[ORM\OneToOne(inversedBy: 'users', cascade: ['persist', 'remove'])]
    private ?Favori $favoris = null;

    /**
     * @var Collection<int, Document>
     */
    #[ORM\OneToMany(targetEntity: Document::class, mappedBy: 'users')]
    private Collection $documents;

    /**
     * @var Collection<int, Search>
     */
    #[ORM\OneToMany(targetEntity: Search::class, mappedBy: 'users')]
    private Collection $searchs;

    #[ORM\Column(length: 255)]
    private ?string $role = null;

    public function __construct()
    {
        $this->documents = new ArrayCollection();
        $this->searchs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirsName(): ?string
    {
        return $this->firsName;
    }

    public function setFirsName(string $firsName): static
    {
        $this->firsName = $firsName;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(?string $pseudo): static
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getComments(): ?Comment
    {
        return $this->comments;
    }

    public function setComments(Comment $comments): static
    {
        $this->comments = $comments;

        return $this;
    }

    public function getFavoris(): ?Favori
    {
        return $this->favoris;
    }

    public function setFavoris(?Favori $favoris): static
    {
        $this->favoris = $favoris;

        return $this;
    }

    /**
     * @return Collection<int, Document>
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(Document $document): static
    {
        if (!$this->documents->contains($document)) {
            $this->documents->add($document);
            $document->setUsers($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): static
    {
        if ($this->documents->removeElement($document)) {
            // set the owning side to null (unless already changed)
            if ($document->getUsers() === $this) {
                $document->setUsers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Search>
     */
    public function getSearchs(): Collection
    {
        return $this->searchs;
    }

    public function addSearch(Search $search): static
    {
        if (!$this->searchs->contains($search)) {
            $this->searchs->add($search);
            $search->setUsers($this);
        }

        return $this;
    }

    public function removeSearch(Search $search): static
    {
        if ($this->searchs->removeElement($search)) {
            // set the owning side to null (unless already changed)
            if ($search->getUsers() === $this) {
                $search->setUsers(null);
            }
        }

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }
}
