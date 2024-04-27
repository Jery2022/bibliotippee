<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240427183336 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE periode_search_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE word_search_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE periode_search (id INT NOT NULL, periode VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE word_search (id INT NOT NULL, word_key VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE word_search_document (word_search_id INT NOT NULL, document_id INT NOT NULL, PRIMARY KEY(word_search_id, document_id))');
        $this->addSql('CREATE INDEX IDX_9C4F68A494F73C3A ON word_search_document (word_search_id)');
        $this->addSql('CREATE INDEX IDX_9C4F68A4C33F7837 ON word_search_document (document_id)');
        $this->addSql('ALTER TABLE word_search_document ADD CONSTRAINT FK_9C4F68A494F73C3A FOREIGN KEY (word_search_id) REFERENCES word_search (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE word_search_document ADD CONSTRAINT FK_9C4F68A4C33F7837 FOREIGN KEY (document_id) REFERENCES document (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE periode_search_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE word_search_id_seq CASCADE');
        $this->addSql('ALTER TABLE word_search_document DROP CONSTRAINT FK_9C4F68A494F73C3A');
        $this->addSql('ALTER TABLE word_search_document DROP CONSTRAINT FK_9C4F68A4C33F7837');
        $this->addSql('DROP TABLE periode_search');
        $this->addSql('DROP TABLE word_search');
        $this->addSql('DROP TABLE word_search_document');
    }
}
