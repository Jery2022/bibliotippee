<?php

namespace App\Entity;

use App\Repository\FavoriRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FavoriRepository::class)]
class Favori
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isFavoris = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\OneToOne(mappedBy: 'favoris', cascade: ['persist', 'remove'])]
    private ?User $users = null;

    #[ORM\OneToOne(inversedBy: 'favoris', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Document $documents = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isFavoris(): ?bool
    {
        return $this->isFavoris;
    }

    public function setFavoris(?bool $isFavoris): static
    {
        $this->isFavoris = $isFavoris;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): static
    {
        // unset the owning side of the relation if necessary
        if ($users === null && $this->users !== null) {
            $this->users->setFavoris(null);
        }

        // set the owning side of the relation if necessary
        if ($users !== null && $users->getFavoris() !== $this) {
            $users->setFavoris($this);
        }

        $this->users = $users;

        return $this;
    }

    public function getDocuments(): ?Document
    {
        return $this->documents;
    }

    public function setDocuments(Document $documents): static
    {
        $this->documents = $documents;

        return $this;
    }
}
