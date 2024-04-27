<?php

namespace App\Entity;

use App\Repository\SearchRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SearchRepository::class)]
class Search
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'searchs')]
    private ?Document $documents = null;

    #[ORM\ManyToOne(inversedBy: 'search')]
    private ?User $users = null;

    /**
     * @var Collection<int, PeriodSearch>
     */
    #[ORM\ManyToMany(targetEntity: PeriodSearch::class, inversedBy: 'searches')]
    private Collection $period;

    /**
     * @var Collection<int, WordSearch>
     */
    #[ORM\ManyToMany(targetEntity: WordSearch::class, inversedBy: 'searches')]
    private Collection $wordSearchKey;

    public function __construct()
    {
        $this->period = new ArrayCollection();
        $this->wordSearchKey = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->getDocuments();
    }   

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDocuments(): ?Document
    {
        return $this->documents;
    }

    public function setDocuments(?Document $documents): static
    {
        $this->documents = $documents;

        return $this;
    }

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): static
    {
        $this->users = $users;

        return $this;
    }

    /**
     * @return Collection<int, PeriodSearch>
     */
    public function getPeriod(): Collection
    {
        return $this->period;
    }

    public function addPeriod(PeriodSearch $period): static
    {
        if (!$this->period->contains($period)) {
            $this->period->add($period);
        }

        return $this;
    }

    public function removePeriod(PeriodSearch $period): static
    {
        $this->period->removeElement($period);

        return $this;
    }

    /**
     * @return Collection<int, WordSearch>
     */
    public function getWordSearchKey(): Collection
    {
        return $this->wordSearchKey;
    }

    public function addWordSearchKey(WordSearch $wordSearchKey): static
    {
        if (!$this->wordSearchKey->contains($wordSearchKey)) {
            $this->wordSearchKey->add($wordSearchKey);
        }

        return $this;
    }

    public function removeWordSearchKey(WordSearch $wordSearchKey): static
    {
        $this->wordSearchKey->removeElement($wordSearchKey);

        return $this;
    }
}
