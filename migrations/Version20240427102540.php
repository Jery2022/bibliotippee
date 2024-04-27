<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240427102540 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX uniq_9474526c5f0f2752');
        $this->addSql('ALTER TABLE comment ALTER documents_id DROP NOT NULL');
        $this->addSql('CREATE INDEX IDX_9474526C5F0F2752 ON comment (documents_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX IDX_9474526C5F0F2752');
        $this->addSql('ALTER TABLE comment ALTER documents_id SET NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX uniq_9474526c5f0f2752 ON comment (documents_id)');
    }
}
