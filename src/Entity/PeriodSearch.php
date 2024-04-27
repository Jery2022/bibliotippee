<?php

namespace App\Entity;

use App\Repository\PeriodSearchRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PeriodSearchRepository::class)]
class PeriodSearch
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $period = null;

    /**
     * @var Collection<int, Search>
     */
    #[ORM\ManyToMany(targetEntity: Search::class, mappedBy: 'period')]
    private Collection $searches;

    public function __construct()
    {
        $this->searches = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->getPeriod();
    }

    public function getId(): ?int
    {
        return $this->id;  
    }

    public function getPeriod(): ?string
    {
        return $this->period;
    }

    public function setPeriod(string $period): static
    {
        $this->period = $period;

        return $this;
    }

    /**
     * @return Collection<int, Search>
     */
    public function getSearches(): Collection
    {
        return $this->searches;
    }

    public function addSearch(Search $search): static
    {
        if (!$this->searches->contains($search)) {
            $this->searches->add($search);
            $search->addPeriod($this);
        }

        return $this;
    }

    public function removeSearch(Search $search): static
    {
        if ($this->searches->removeElement($search)) {
            $search->removePeriod($this);
        }

        return $this;
    }
}
