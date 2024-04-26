<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240425180649 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE upload ADD image_file VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE upload ADD image_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE upload ADD image_size DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE upload ADD extension_file VARCHAR(3) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE upload DROP image_file');
        $this->addSql('ALTER TABLE upload DROP image_name');
        $this->addSql('ALTER TABLE upload DROP image_size');
        $this->addSql('ALTER TABLE upload DROP extension_file');
    }
}
