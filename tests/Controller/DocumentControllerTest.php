<?php

namespace App\Test\Controller;

use App\Entity\Document;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DocumentControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/document/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(Document::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Document index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'document[title]' => 'Testing',
            'document[author]' => 'Testing',
            'document[isPublished]' => 'Testing',
            'document[description]' => 'Testing',
            'document[FileNameDocument]' => 'Testing',
            'document[fileSizeDocument]' => 'Testing',
            'document[fileMimeTypeDocument]' => 'Testing',
            'document[createdAt]' => 'Testing',
            'document[publishAt]' => 'Testing',
            'document[users]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Document();
        $fixture->setTitle('My Title');
        $fixture->setAuthor('My Title');
        $fixture->setIsPublished('My Title');
        $fixture->setDescription('My Title');
        $fixture->setFileNameDocument('My Title');
        $fixture->setFileSizeDocument('My Title');
        $fixture->setFileMimeTypeDocument('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setPublishAt('My Title');
        $fixture->setUsers('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Document');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Document();
        $fixture->setTitle('Value');
        $fixture->setAuthor('Value');
        $fixture->setIsPublished('Value');
        $fixture->setDescription('Value');
        $fixture->setFileNameDocument('Value');
        $fixture->setFileSizeDocument('Value');
        $fixture->setFileMimeTypeDocument('Value');
        $fixture->setCreatedAt('Value');
        $fixture->setPublishAt('Value');
        $fixture->setUsers('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'document[title]' => 'Something New',
            'document[author]' => 'Something New',
            'document[isPublished]' => 'Something New',
            'document[description]' => 'Something New',
            'document[FileNameDocument]' => 'Something New',
            'document[fileSizeDocument]' => 'Something New',
            'document[fileMimeTypeDocument]' => 'Something New',
            'document[createdAt]' => 'Something New',
            'document[publishAt]' => 'Something New',
            'document[users]' => 'Something New',
        ]);

        self::assertResponseRedirects('/document/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getTitle());
        self::assertSame('Something New', $fixture[0]->getAuthor());
        self::assertSame('Something New', $fixture[0]->getIsPublished());
        self::assertSame('Something New', $fixture[0]->getDescription());
        self::assertSame('Something New', $fixture[0]->getFileNameDocument());
        self::assertSame('Something New', $fixture[0]->getFileSizeDocument());
        self::assertSame('Something New', $fixture[0]->getFileMimeTypeDocument());
        self::assertSame('Something New', $fixture[0]->getCreatedAt());
        self::assertSame('Something New', $fixture[0]->getPublishAt());
        self::assertSame('Something New', $fixture[0]->getUsers());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Document();
        $fixture->setTitle('Value');
        $fixture->setAuthor('Value');
        $fixture->setIsPublished('Value');
        $fixture->setDescription('Value');
        $fixture->setFileNameDocument('Value');
        $fixture->setFileSizeDocument('Value');
        $fixture->setFileMimeTypeDocument('Value');
        $fixture->setCreatedAt('Value');
        $fixture->setPublishAt('Value');
        $fixture->setUsers('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/document/');
        self::assertSame(0, $this->repository->count([]));
    }
}
