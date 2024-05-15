<?php

namespace App\Entity;

use App\Repository\DocumentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: DocumentRepository::class)]
#[Vich\Uploadable]
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

    #[ORM\Column]
    private ?bool $isPublished = null;

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

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'document')]
    private ?User $users = null;

    /**
     * @var Collection<int, Upload>
     */
    #[ORM\OneToMany(targetEntity: Upload::class, mappedBy: 'document')]
    private Collection $uploads;

    // NOTE: This is not a mapped field of entity metadata, just a simple property.
    #[Vich\UploadableField(mapping: 'document', fileNameProperty: 'fileNameDocument', size: 'fileSizeDocument', mimeType: 'fileMimeTypeDocument')]
    private ?File $imageNameDocument = null;

    #[ORM\Column(nullable: true)]
    private ?string $FileNameDocument = null;

    #[ORM\Column(nullable: true)]
    private ?int $fileSizeDocument = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $fileMimeTypeDocument = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable : true)]
    private ?\DateTimeImmutable $publishAt = null;

    // NOTE: This is not a mapped field of entity metadata, just a simple property.
    #[Vich\UploadableField(mapping : 'imagedocument', fileNameProperty: 'fileNameImageDocument', size: 'fileNameSizeImageDocument', mimeType: 'fileNameMimeTypeImageDocument')]
    private ?File $imageDocument = null;

    #[ORM\Column(nullable: true)]
    private ?string $fileNameImageDocument = null;

    #[ORM\Column(nullable: true)]
    private ?int $fileNameSizeImageDocument = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $fileNameMimeTypeImageDocument = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $imageDocumentCreatedAt = null;

    /**
     * @var Collection<int, Favori>
     */
    #[ORM\OneToMany(targetEntity : Favori::class, mappedBy: 'documents')]
    private Collection $favoris;

    /**
     * @var Collection<int, Comment>
     */
    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'documents')]
    private Collection $comments;

    #[ORM\ManyToOne(inversedBy: 'documents')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;

    public function __construct()
    {
        $this->downloads = new ArrayCollection();
        $this->searchs = new ArrayCollection();
        $this->uploads = new ArrayCollection();
        $this->favoris = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->getTitle();
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

    public function isPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): static
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

    public function getPublishAt(): ?\DateTimeImmutable
    {
        return $this->publishAt;
    }

    public function setPublishAt(\DateTimeImmutable $publishAt): static
    {
        $this->publishAt = $publishAt;

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

    /**
     * Get the value of imageNameDocument
     */
    public function getImageNameDocument()
    {
        return $this->imageNameDocument;
    }
    /**
     * Set the value of imageNameDocument
     *
     * @return  self
     */
    public function setImageNameDocument($imageNameDocument)
    {
        $this->imageNameDocument = $imageNameDocument;
        return $this;
    }

    /**
     * Get the value of fileMimeTypeDocument
     */
    public function getFileMimeTypeDocument()
    {
        return $this->fileMimeTypeDocument;
    }

    /**
     * Set the value of fileMimeTypeDocument
     *
     * @return  self
     */
    public function setFileMimeTypeDocument($fileMimeTypeDocument)
    {
        $this->fileMimeTypeDocument = $fileMimeTypeDocument;
        return $this;
    }

    /**
     * Get the value of fileSizeDocument
     */
    public function getFileSizeDocument()
    {
        return $this->fileSizeDocument;
    }

    /**
     * Set the value of fileSizeDocument
     *
     * @return  self
     */
    public function setFileSizeDocument($fileSizeDocument)
    {
        $this->fileSizeDocument = $fileSizeDocument;
        return $this;
    }

    /**
     * Get the value of FileNameDocument
     */
    public function getFileNameDocument()
    {
        return $this->FileNameDocument;
    }
    /**
     * Set the value of FileNameDocument
     *
     * @return  self
     */
    public function setFileNameDocument($FileNameDocument)
    {
        $this->FileNameDocument = $FileNameDocument;
        return $this;
    }

    /**
     * @return Collection<int, Favori>
     */
    public function getFavoris(): Collection
    {
        return $this->favoris;
    }

    public function addFavori(Favori $favori): static
    {
        if (!$this->favoris->contains($favori)) {
            $this->favoris->add($favori);
            $favori->setDocuments($this);
        }

        return $this;
    }

    public function removeFavori(Favori $favori): static
    {
        if ($this->favoris->removeElement($favori)) {
            // set the owning side to null (unless already changed)
            if ($favori->getDocuments() === $this) {
                $favori->setDocuments(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): static
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setDocuments($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): static
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getDocuments() === $this) {
                $comment->setDocuments(null);
            }
        }

        return $this;
    }

    /**
     * Get the value of imageDocument
     */
    public function getImageDocument()
    {
        return $this->imageDocument;
    }

    /**
     * Set the value of imageDocument
     *
     * @return  self
     */
    public function setImageDocument($imageDocument)
    {
        $this->imageDocument = $imageDocument;

        return $this;
    }

    /**
     * Get the value of fileNameImageDocument
     */
    public function getFileNameImageDocument()
    {
        return $this->fileNameImageDocument;
    }

    /**
     * Set the value of fileNameImageDocument
     *
     * @return  self
     */
    public function setFileNameImageDocument($fileNameImageDocument)
    {
        $this->fileNameImageDocument = $fileNameImageDocument;

        return $this;
    }

    /**
     * Get the value of fileNameSizeImageDocument
     */
    public function getFileNameSizeImageDocument()
    {
        return $this->fileNameSizeImageDocument;
    }

    /**
     * Set the value of fileNameSizeImageDocument
     *
     * @return  self
     */
    public function setFileNameSizeImageDocument($fileNameSizeImageDocument)
    {
        $this->fileNameSizeImageDocument = $fileNameSizeImageDocument;

        return $this;
    }

    /**
     * Get the value of fileNameMimeTypeImageDocument
     */
    public function getFileNameMimeTypeImageDocument()
    {
        return $this->fileNameMimeTypeImageDocument;
    }

    /**
     * Set the value of fileNameMimeTypeImageDocument
     *
     * @return  self
     */
    public function setFileNameMimeTypeImageDocument($fileNameMimeTypeImageDocument)
    {
        $this->fileNameMimeTypeImageDocument = $fileNameMimeTypeImageDocument;

        return $this;
    }

    /**
     * Get the value of imageDocumentCreatedAt
     */
    public function getImageDocumentCreatedAt()
    {
        return $this->imageDocumentCreatedAt;
    }

    /**
     * Set the value of imageDocumentCreatedAt
     *
     * @return  self
     */
    public function setImageDocumentCreatedAt($imageDocumentCreatedAt)
    {
        $this->imageDocumentCreatedAt = $imageDocumentCreatedAt;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }
}
