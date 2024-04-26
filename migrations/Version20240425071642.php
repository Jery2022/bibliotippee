<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240425071642 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment ADD users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C67B3B43D FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9474526C67B3B43D ON comment (users_id)');
        $this->addSql('ALTER TABLE document ADD users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A7667B3B43D FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_D8698A7667B3B43D ON document (users_id)');
        $this->addSql('ALTER TABLE search ADD users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE search ADD CONSTRAINT FK_B4F0DBA767B3B43D FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_B4F0DBA767B3B43D ON search (users_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE search DROP CONSTRAINT FK_B4F0DBA767B3B43D');
        $this->addSql('DROP INDEX IDX_B4F0DBA767B3B43D');
        $this->addSql('ALTER TABLE search DROP users_id');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526C67B3B43D');
        $this->addSql('DROP INDEX IDX_9474526C67B3B43D');
        $this->addSql('ALTER TABLE comment DROP users_id');
        $this->addSql('ALTER TABLE document DROP CONSTRAINT FK_D8698A7667B3B43D');
        $this->addSql('DROP INDEX IDX_D8698A7667B3B43D');
        $this->addSql('ALTER TABLE document DROP users_id');
    }
}
