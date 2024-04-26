<?php

namespace App\Entity;

use App\Repository\DocumentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DocumentRepository::class)]
class Document
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $author = null;

    #[ORM\Column(length: 255)]
    private ?string $filePath = null;

    #[ORM\Column(length: 255)]
    private ?string $fileFormat = null;

    #[ORM\Column(length: 255)]
    private ?string $taille = null;

    #[ORM\Column]
    private ?bool $isPublished = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $publishedAt = null;

    #[ORM\Column(length: 255)]
    private ?string $filePathImageGarde = null;

     

    /**
     * @var Collection<int, Download>
     */
    #[ORM\OneToMany(targetEntity: Download::class, mappedBy: 'documents')]
    private Collection $downloads;

    /**
     * @var Collection<int, Search>
     */
    #[ORM\OneToMany(targetEntity: Search::class, mappedBy: 'documents')]
    private Collection $searchs;

    #[ORM\OneToOne(mappedBy: 'documents', cascade: ['persist', 'remove'])]
    private ?Comment $comments = null;

    #[ORM\OneToOne(mappedBy: 'documents', cascade: ['persist', 'remove'])]
    private ?Favori $favoris = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'document')]
    private ?User $users = null;

    /**
     * @var Collection<int, Upload>
     */
    #[ORM\OneToMany(targetEntity: Upload::class, mappedBy: 'document')]
    private Collection $uploads;


    public function __construct()
    {
        $this->downloads = new ArrayCollection();
        $this->searchs = new ArrayCollection();
        $this->uploads = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->getId();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function getFilePath(): ?string
    {
        return $this->filePath;
    }

    public function setFilePath(string $filePath): static
    {
        $this->filePath = $filePath;

        return $this;
    }

    public function getFileFormat(): ?string
    {
        return $this->fileFormat;
    }

    public function setFileFormat(string $fileFormat): static
    {
        $this->fileFormat = $fileFormat;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(string $taille): static
    {
        $this->taille = $taille;

        return $this;
    }

    public function isPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setPublished(bool $isPublished): static
    {
        $this->isPublished = $isPublished;

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

    public function getPublishedAt(): ?\DateTimeImmutable
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(\DateTimeImmutable $publishedAt): static
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    public function getFilePathImageGarde(): ?string
    {
        return $this->filePathImageGarde;
    }

    public function setFilePathImageGarde(string $filePathImageGarde): static
    {
        $this->filePathImageGarde = $filePathImageGarde;

        return $this;
    }
 
 

    /**
     * @return Collection<int, Download>
     */
    public function getDownloads(): Collection
    {
        return $this->downloads;
    }

    public function addDownload(Download $download): static
    {
        if (!$this->downloads->contains($download)) {
            $this->downloads->add($download);
            $download->setDocuments($this);
        }

        return $this;
    }

    public function removeDownload(Download $download): static
    {
        if ($this->downloads->removeElement($download)) {
            // set the owning side to null (unless already changed)
            if ($download->getDocuments() === $this) {
                $download->setDocuments(null);
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
            $search->setDocuments($this);
        }

        return $this;
    }

    public function removeSearch(Search $search): static
    {
        if ($this->searchs->removeElement($search)) {
            // set the owning side to null (unless already changed)
            if ($search->getDocuments() === $this) {
                $search->setDocuments(null);
            }
        }

        return $this;
    }

    public function getComments(): ?Comment
    {
        return $this->comments;
    }

    public function setComments(Comment $comments): static
    {
        // set the owning side of the relation if necessary
        if ($comments->getDocuments() !== $this) {
            $comments->setDocuments($this);
        }

        $this->comments = $comments;

        return $this;
    }

    public function getFavoris(): ?Favori
    {
        return $this->favoris;
    }

    public function setFavoris(Favori $favoris): static
    {
        // set the owning side of the relation if necessary
        if ($favoris->getDocuments() !== $this) {
            $favoris->setDocuments($this);
        }

        $this->favoris = $favoris;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

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
     * @return Collection<int, Upload>
     */
    public function getUploads(): Collection
    {
        return $this->uploads;
    }

    public function addUpload(Upload $upload): static
    {
        if (!$this->uploads->contains($upload)) {
            $this->uploads->add($upload);
            $upload->setDocument($this);
        }

        return $this;
    }

    public function removeUpload(Upload $upload): static
    {
        if ($this->uploads->removeElement($upload)) {
            // set the owning side to null (unless already changed)
            if ($upload->getDocument() === $this) {
                $upload->setDocument(null);
            }
        }

        return $this;
    }
  
}
