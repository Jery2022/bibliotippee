<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240427213211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE search_period_search (search_id INT NOT NULL, period_search_id INT NOT NULL, PRIMARY KEY(search_id, period_search_id))');
        $this->addSql('CREATE INDEX IDX_E865D5FC650760A9 ON search_period_search (search_id)');
        $this->addSql('CREATE INDEX IDX_E865D5FCB1D91B7B ON search_period_search (period_search_id)');
        $this->addSql('CREATE TABLE search_word_search (search_id INT NOT NULL, word_search_id INT NOT NULL, PRIMARY KEY(search_id, word_search_id))');
        $this->addSql('CREATE INDEX IDX_BD4092B7650760A9 ON search_word_search (search_id)');
        $this->addSql('CREATE INDEX IDX_BD4092B794F73C3A ON search_word_search (word_search_id)');
        $this->addSql('ALTER TABLE search_period_search ADD CONSTRAINT FK_E865D5FC650760A9 FOREIGN KEY (search_id) REFERENCES search (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE search_period_search ADD CONSTRAINT FK_E865D5FCB1D91B7B FOREIGN KEY (period_search_id) REFERENCES period_search (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE search_word_search ADD CONSTRAINT FK_BD4092B7650760A9 FOREIGN KEY (search_id) REFERENCES search (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE search_word_search ADD CONSTRAINT FK_BD4092B794F73C3A FOREIGN KEY (word_search_id) REFERENCES word_search (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE word_search_document DROP CONSTRAINT fk_9c4f68a494f73c3a');
        $this->addSql('ALTER TABLE word_search_document DROP CONSTRAINT fk_9c4f68a4c33f7837');
        $this->addSql('ALTER TABLE period_search_document DROP CONSTRAINT fk_55c11e7fb1d91b7b');
        $this->addSql('ALTER TABLE period_search_document DROP CONSTRAINT fk_55c11e7fc33f7837');
        $this->addSql('DROP TABLE word_search_document');
        $this->addSql('DROP TABLE period_search_document');
        $this->addSql('ALTER TABLE search RENAME COLUMN word_key TO word_keys');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE word_search_document (word_search_id INT NOT NULL, document_id INT NOT NULL, PRIMARY KEY(word_search_id, document_id))');
        $this->addSql('CREATE INDEX idx_9c4f68a4c33f7837 ON word_search_document (document_id)');
        $this->addSql('CREATE INDEX idx_9c4f68a494f73c3a ON word_search_document (word_search_id)');
        $this->addSql('CREATE TABLE period_search_document (period_search_id INT NOT NULL, document_id INT NOT NULL, PRIMARY KEY(period_search_id, document_id))');
        $this->addSql('CREATE INDEX idx_55c11e7fc33f7837 ON period_search_document (document_id)');
        $this->addSql('CREATE INDEX idx_55c11e7fb1d91b7b ON period_search_document (period_search_id)');
        $this->addSql('ALTER TABLE word_search_document ADD CONSTRAINT fk_9c4f68a494f73c3a FOREIGN KEY (word_search_id) REFERENCES word_search (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE word_search_document ADD CONSTRAINT fk_9c4f68a4c33f7837 FOREIGN KEY (document_id) REFERENCES document (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE period_search_document ADD CONSTRAINT fk_55c11e7fb1d91b7b FOREIGN KEY (period_search_id) REFERENCES period_search (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE period_search_document ADD CONSTRAINT fk_55c11e7fc33f7837 FOREIGN KEY (document_id) REFERENCES document (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE search_period_search DROP CONSTRAINT FK_E865D5FC650760A9');
        $this->addSql('ALTER TABLE search_period_search DROP CONSTRAINT FK_E865D5FCB1D91B7B');
        $this->addSql('ALTER TABLE search_word_search DROP CONSTRAINT FK_BD4092B7650760A9');
        $this->addSql('ALTER TABLE search_word_search DROP CONSTRAINT FK_BD4092B794F73C3A');
        $this->addSql('DROP TABLE search_period_search');
        $this->addSql('DROP TABLE search_word_search');
        $this->addSql('ALTER TABLE search RENAME COLUMN word_keys TO word_key');
    }
}
