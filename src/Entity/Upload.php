<?php

namespace App\Entity;

use App\Repository\UploadRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: UploadRepository::class)]
#[Vich\Uploadable]
class Upload
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

     // NOTE: This is not a mapped field of entity metadata, just a simple property.
     #[Vich\UploadableField(mapping: 'documents', fileNameProperty: 'imageNameDocuments', size: 'imageSizeDocuments')]
     private ?File $imageFileDocuments = null;
 
     #[ORM\Column(nullable: true)]
     private ?string $imageNameDocuments = null;
 
     #[ORM\Column(nullable: true)]
     private ?int $imageSizeDocuments = null;
 
     #[ORM\Column(nullable: true)]
     private ?\DateTimeImmutable $updatedImageDocumentsAt = null;

    #[ORM\ManyToOne]
    private ?User $users = null;

    #[ORM\ManyToOne(inversedBy: 'uploads')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Document $document = null;

    #[ORM\Column(length: 3)]
    private ?string $extensionFile = null;

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFileDocuments(?File $imageFileDocuments = null): void
    {
        $this->imageFileDocuments = $imageFileDocuments;

        if (null !== $imageFileDocuments) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedImageDocumentsAt = new \DateTimeImmutable();
        }
    }

    public function getImageFileDocuments(): ?File
    {
        return $this->imageFileDocuments;
    }

    public function setImageNameDocuments(?string $imageNameDocuments): void
    {
        $this->imageNameDocuments = $imageNameDocuments;
    }

    public function getImageNameDocuments(): ?string
    {
        return $this->imageNameDocuments;
    }

    public function setImageSizeDocuments(?int $imageSizeDocuments): void
    {
        $this->imageSizeDocuments = $imageSizeDocuments;
    }

    public function getImageSizeDocuments(): ?int
    {
        return $this->imageSizeDocuments;
    }

    /**
     * @var Collection<int, Document>
     */
   
    public function getId(): ?int
    {
        return $this->id;
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

    public function getDocument(): ?Document
    {
        return $this->document;
    }

    public function setDocument(?Document $document): static
    {
        $this->document = $document;

        return $this;
    }

    

    public function getExtensionFile(): ?string
    {
        return $this->extensionFile;
    }

    public function setExtensionFile(string $extensionFile): static
    {
        $this->extensionFile = $extensionFile;

        return $this;
    }

}
