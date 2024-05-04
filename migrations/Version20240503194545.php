<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240503194545 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document ADD file_image_document VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE document ADD file_size_image_document INT DEFAULT NULL');
        $this->addSql('ALTER TABLE document ADD image_document_created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE document RENAME COLUMN original_file_name_document TO file_mime_type_image_document');
        $this->addSql('COMMENT ON COLUMN document.image_document_created_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE document DROP file_image_document');
        $this->addSql('ALTER TABLE document DROP file_size_image_document');
        $this->addSql('ALTER TABLE document DROP image_document_created_at');
        $this->addSql('ALTER TABLE document RENAME COLUMN file_mime_type_image_document TO original_file_name_document');
    }
}
