<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240427191054 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE period_search_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE period_search (id INT NOT NULL, period VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE period_search_document (period_search_id INT NOT NULL, document_id INT NOT NULL, PRIMARY KEY(period_search_id, document_id))');
        $this->addSql('CREATE INDEX IDX_55C11E7FB1D91B7B ON period_search_document (period_search_id)');
        $this->addSql('CREATE INDEX IDX_55C11E7FC33F7837 ON period_search_document (document_id)');
        $this->addSql('ALTER TABLE period_search_document ADD CONSTRAINT FK_55C11E7FB1D91B7B FOREIGN KEY (period_search_id) REFERENCES period_search (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE period_search_document ADD CONSTRAINT FK_55C11E7FC33F7837 FOREIGN KEY (document_id) REFERENCES document (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE period_search_id_seq CASCADE');
        $this->addSql('ALTER TABLE period_search_document DROP CONSTRAINT FK_55C11E7FB1D91B7B');
        $this->addSql('ALTER TABLE period_search_document DROP CONSTRAINT FK_55C11E7FC33F7837');
        $this->addSql('DROP TABLE period_search');
        $this->addSql('DROP TABLE period_search_document');
    }
}
