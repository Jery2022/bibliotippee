<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240427100415 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX uniq_ef85a2cc5f0f2752');
        $this->addSql('ALTER TABLE favori ALTER documents_id DROP NOT NULL');
        $this->addSql('CREATE INDEX IDX_EF85A2CC5F0F2752 ON favori (documents_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX IDX_EF85A2CC5F0F2752');
        $this->addSql('ALTER TABLE favori ALTER documents_id SET NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX uniq_ef85a2cc5f0f2752 ON favori (documents_id)');
    }
}
