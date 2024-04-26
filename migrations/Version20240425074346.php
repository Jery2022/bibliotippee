<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240425074346 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document DROP CONSTRAINT fk_d8698a76cccfba31');
        $this->addSql('DROP INDEX idx_d8698a76cccfba31');
        $this->addSql('ALTER TABLE document DROP upload_id');
        $this->addSql('ALTER TABLE upload ADD document_id INT NOT NULL');
        $this->addSql('ALTER TABLE upload ADD CONSTRAINT FK_17BDE61FC33F7837 FOREIGN KEY (document_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_17BDE61FC33F7837 ON upload (document_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE document ADD upload_id INT NOT NULL');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT fk_d8698a76cccfba31 FOREIGN KEY (upload_id) REFERENCES upload (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_d8698a76cccfba31 ON document (upload_id)');
        $this->addSql('ALTER TABLE upload DROP CONSTRAINT FK_17BDE61FC33F7837');
        $this->addSql('DROP INDEX IDX_17BDE61FC33F7837');
        $this->addSql('ALTER TABLE upload DROP document_id');
    }
}
