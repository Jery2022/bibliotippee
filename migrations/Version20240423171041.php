<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240423171041 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE document_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE download_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE search_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE document (id INT NOT NULL, users_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, author VARCHAR(255) NOT NULL, file_path VARCHAR(255) NOT NULL, file_format VARCHAR(255) NOT NULL, taille VARCHAR(255) NOT NULL, is_published BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, published_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, file_path_image_garde VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D8698A7667B3B43D ON document (users_id)');
        $this->addSql('COMMENT ON COLUMN document.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN document.published_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE download (id INT NOT NULL, documents_id INT DEFAULT NULL, users_id INT DEFAULT NULL, downloader_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_781A82705F0F2752 ON download (documents_id)');
        $this->addSql('CREATE INDEX IDX_781A827067B3B43D ON download (users_id)');
        $this->addSql('COMMENT ON COLUMN download.downloader_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE search (id INT NOT NULL, users_id INT DEFAULT NULL, documents_id INT DEFAULT NULL, word_key VARCHAR(255) NOT NULL, periode VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B4F0DBA767B3B43D ON search (users_id)');
        $this->addSql('CREATE INDEX IDX_B4F0DBA75F0F2752 ON search (documents_id)');
        $this->addSql('COMMENT ON COLUMN search.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A7667B3B43D FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE download ADD CONSTRAINT FK_781A82705F0F2752 FOREIGN KEY (documents_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE download ADD CONSTRAINT FK_781A827067B3B43D FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE search ADD CONSTRAINT FK_B4F0DBA767B3B43D FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE search ADD CONSTRAINT FK_B4F0DBA75F0F2752 FOREIGN KEY (documents_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD documents_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C5F0F2752 FOREIGN KEY (documents_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9474526C5F0F2752 ON comment (documents_id)');
        $this->addSql('ALTER TABLE favori ADD documents_id INT NOT NULL');
        $this->addSql('ALTER TABLE favori ADD CONSTRAINT FK_EF85A2CC5F0F2752 FOREIGN KEY (documents_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EF85A2CC5F0F2752 ON favori (documents_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526C5F0F2752');
        $this->addSql('ALTER TABLE favori DROP CONSTRAINT FK_EF85A2CC5F0F2752');
        $this->addSql('DROP SEQUENCE document_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE download_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE search_id_seq CASCADE');
        $this->addSql('ALTER TABLE document DROP CONSTRAINT FK_D8698A7667B3B43D');
        $this->addSql('ALTER TABLE download DROP CONSTRAINT FK_781A82705F0F2752');
        $this->addSql('ALTER TABLE download DROP CONSTRAINT FK_781A827067B3B43D');
        $this->addSql('ALTER TABLE search DROP CONSTRAINT FK_B4F0DBA767B3B43D');
        $this->addSql('ALTER TABLE search DROP CONSTRAINT FK_B4F0DBA75F0F2752');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE download');
        $this->addSql('DROP TABLE search');
        $this->addSql('DROP INDEX UNIQ_EF85A2CC5F0F2752');
        $this->addSql('ALTER TABLE favori DROP documents_id');
        $this->addSql('DROP INDEX UNIQ_9474526C5F0F2752');
        $this->addSql('ALTER TABLE comment DROP documents_id');
    }
}
