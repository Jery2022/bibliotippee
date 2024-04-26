<?php

namespace App\Entity;

use App\Repository\DownloadRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DownloadRepository::class)]
class Download
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $downloaderAt = null;

    #[ORM\ManyToOne(inversedBy: 'downloads')]
    private ?Document $documents = null;

    #[ORM\ManyToOne(inversedBy: 'download')]
    private ?User $users = null;
 

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDownloaderAt(): ?\DateTimeImmutable
    {
        return $this->downloaderAt;
    }

    public function setDownloaderAt(\DateTimeImmutable $downloaderAt): static
    {
        $this->downloaderAt = $downloaderAt;

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
  
}
