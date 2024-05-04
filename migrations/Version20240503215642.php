<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240503215642 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document RENAME COLUMN file_image_document TO file_name_image_document');
        $this->addSql('ALTER TABLE document RENAME COLUMN file_size_image_document TO file_name_size_image_document');
        $this->addSql('ALTER TABLE document RENAME COLUMN file_mime_type_image_document TO file_name_mime_type_image_document');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE document RENAME COLUMN file_name_mime_type_image_document TO file_mime_type_image_document');
        $this->addSql('ALTER TABLE document RENAME COLUMN file_name_image_document TO file_image_document');
        $this->addSql('ALTER TABLE document RENAME COLUMN file_name_size_image_document TO file_size_image_document');
    }
}
