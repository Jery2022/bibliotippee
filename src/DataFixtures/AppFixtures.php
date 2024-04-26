<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use App\Entity\Document;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    
    public function load(ObjectManager $manager): void
    {
        $id_comments = 0;

        for ($i = 0; $i < 10; $i++) {
        // Creation des utilistaeurs
        $user = new User();
        $user->setLastName('Doe');
        $user->setFirsName('John');
        $user->setPseudo('johndoe');
        $user->setEmail('john.doe@example.com');
        $user->setPassword('password123');
        $user->setRole('ROLE_USER');
       // $user->setComments($this->getReference('user'));
       // $this->addReference($i, $comments);
      //  $user->addDocument(mt_rand(10, 100));
        $manager->persist($user);

        // Creation de documents
            $document = new Document();
            $document->setTitle('Document Title N° '.$i);
            $document->setAuthor('John Doe Junior'.$i);
            $document->setFilePath('/path/to/document'.$i.'.pdf');
            $document->setFileFormat('pdf');
            $document->setTaille('10MB');
            $document->setPublished(true);
            $document->setCreatedAt(new \DateTimeImmutable());
            $document->setPublishedAt(new \DateTimeImmutable());
            $document->setFilePathImageGarde('/path/to/image.jpg');
            // Set the associated User entity
        /*    $document->setUsers(add(function (Category $category): string {
                return $this->getReference('user')};)
                
                );*/
            $document->createdBy($this->getReference('user'));
            $manager->persist($document);

        // Creation d'un nouveau commentaire
            $comment = new Comment();
            $comment->setAuthor('John Doe'.$i);
            $comment->setContenu('This is a comment N° '.$i);
            $comment->setPublished(true);
            $comment->setCreatedAt(new \DateTimeImmutable());
            $comment->setPhotoFilename('urlPhotocomment'.$i.'.jpg');
            // Set the associated Document entity
            $comment->setDocuments($this->getReference('user')); // Set the associated Document entity
            $manager->persist($comment);
        }

        $manager->flush();
    }
}
