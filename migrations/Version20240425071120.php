<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240425071120 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document DROP CONSTRAINT fk_d8698a7667b3b43d');
        $this->addSql('DROP INDEX idx_d8698a7667b3b43d');
        $this->addSql('ALTER TABLE document DROP users_id');
        $this->addSql('ALTER TABLE download DROP CONSTRAINT fk_781a827067b3b43d');
        $this->addSql('DROP INDEX idx_781a827067b3b43d');
        $this->addSql('ALTER TABLE download DROP users_id');
        $this->addSql('ALTER TABLE favori ADD users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE favori ADD CONSTRAINT FK_EF85A2CC67B3B43D FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_EF85A2CC67B3B43D ON favori (users_id)');
        $this->addSql('ALTER TABLE search DROP CONSTRAINT fk_b4f0dba767b3b43d');
        $this->addSql('DROP INDEX idx_b4f0dba767b3b43d');
        $this->addSql('ALTER TABLE search DROP users_id');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT fk_8d93d64963379586');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT fk_8d93d64951e8871b');
        $this->addSql('DROP INDEX uniq_8d93d64951e8871b');
        $this->addSql('DROP INDEX uniq_8d93d64963379586');
        $this->addSql('ALTER TABLE "user" DROP comments_id');
        $this->addSql('ALTER TABLE "user" DROP favoris_id');
        $this->addSql('ALTER TABLE "user" DROP password');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE favori DROP CONSTRAINT FK_EF85A2CC67B3B43D');
        $this->addSql('DROP INDEX IDX_EF85A2CC67B3B43D');
        $this->addSql('ALTER TABLE favori DROP users_id');
        $this->addSql('ALTER TABLE document ADD users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT fk_d8698a7667b3b43d FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_d8698a7667b3b43d ON document (users_id)');
        $this->addSql('ALTER TABLE search ADD users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE search ADD CONSTRAINT fk_b4f0dba767b3b43d FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_b4f0dba767b3b43d ON search (users_id)');
        $this->addSql('ALTER TABLE download ADD users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE download ADD CONSTRAINT fk_781a827067b3b43d FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_781a827067b3b43d ON download (users_id)');
        $this->addSql('ALTER TABLE "user" ADD comments_id INT NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD favoris_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD password VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT fk_8d93d64963379586 FOREIGN KEY (comments_id) REFERENCES comment (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT fk_8d93d64951e8871b FOREIGN KEY (favoris_id) REFERENCES favori (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_8d93d64951e8871b ON "user" (favoris_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_8d93d64963379586 ON "user" (comments_id)');
    }
}
