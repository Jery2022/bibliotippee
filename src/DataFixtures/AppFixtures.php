<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $comment = new Comment();
            $comment->setAuthor('John Doe'.$i);
            $comment->setContenu('This is a comment N° '.$i);
            $comment->setPublished(true);
            $comment->setCreatedAt(new \DateTimeImmutable());
            $comment->setPhotoFilename('urlPhotocomment'.$i.'.jpg');
            // Set the associated Document entity
            $comment->setDocuments($this->getReference('document'));
            $manager->persist($comment);
        }

        $manager->flush();
    }
}
