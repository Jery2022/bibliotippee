<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240426101739 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document ADD image_name_document VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE document ADD file_name_document VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE document DROP file_path');
        $this->addSql('ALTER TABLE document DROP file_format');
        $this->addSql('ALTER TABLE document DROP taille');
        $this->addSql('ALTER TABLE document DROP file_path_image_garde');
        $this->addSql('ALTER TABLE upload ADD image_name_documents VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE upload ADD image_size_documents INT DEFAULT NULL');
        $this->addSql('ALTER TABLE upload ADD updated_image_documents_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE upload DROP upload_at');
        $this->addSql('ALTER TABLE upload DROP image_file');
        $this->addSql('ALTER TABLE upload DROP image_name');
        $this->addSql('ALTER TABLE upload DROP image_size');
        $this->addSql('COMMENT ON COLUMN upload.updated_image_documents_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE document ADD file_path VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE document ADD file_format VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE document ADD taille VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE document ADD file_path_image_garde VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE document DROP image_name_document');
        $this->addSql('ALTER TABLE document DROP file_name_document');
        $this->addSql('ALTER TABLE upload ADD upload_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE upload ADD image_file VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE upload ADD image_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE upload ADD image_size DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE upload DROP image_name_documents');
        $this->addSql('ALTER TABLE upload DROP image_size_documents');
        $this->addSql('ALTER TABLE upload DROP updated_image_documents_at');
        $this->addSql('COMMENT ON COLUMN upload.upload_at IS \'(DC2Type:datetime_immutable)\'');
    }
}
