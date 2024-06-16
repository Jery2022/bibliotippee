<?php

declare (strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240616104841 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT NOT NULL, intitule VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE comment (id INT NOT NULL, users_id INT DEFAULT NULL, documents_id INT DEFAULT NULL, content TEXT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, is_valided BOOLEAN NOT NULL, rate INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9474526C67B3B43D ON comment (users_id)');
        $this->addSql('CREATE INDEX IDX_9474526C5F0F2752 ON comment (documents_id)');
        $this->addSql('COMMENT ON COLUMN comment.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE document (id INT NOT NULL, users_id INT DEFAULT NULL, category_id INT NOT NULL, title VARCHAR(255) NOT NULL, author VARCHAR(255) NOT NULL, is_published BOOLEAN NOT NULL, description TEXT NOT NULL, file_name_document VARCHAR(255) DEFAULT NULL, file_size_document INT DEFAULT NULL, file_mime_type_document VARCHAR(50) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, publish_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, file_name_image_document VARCHAR(255) DEFAULT NULL, file_name_size_image_document INT DEFAULT NULL, file_name_mime_type_image_document VARCHAR(50) DEFAULT NULL, image_document_created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D8698A7667B3B43D ON document (users_id)');
        $this->addSql('CREATE INDEX IDX_D8698A7612469DE2 ON document (category_id)');
        $this->addSql('COMMENT ON COLUMN document.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN document.publish_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN document.image_document_created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, pseudo VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, image_name_avatar VARCHAR(255) DEFAULT NULL, image_size_avatar INT DEFAULT NULL, updated_image_avatar_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, is_verified BOOLEAN NOT NULL, rese_token VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN "user".updated_image_avatar_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C67B3B43D FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C5F0F2752 FOREIGN KEY (documents_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A7667B3B43D FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A7612469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE download ADD CONSTRAINT FK_781A82705F0F2752 FOREIGN KEY (documents_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE download ADD CONSTRAINT FK_781A827067B3B43D FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE favori ADD CONSTRAINT FK_EF85A2CC67B3B43D FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE favori ADD CONSTRAINT FK_EF85A2CC5F0F2752 FOREIGN KEY (documents_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE search ADD CONSTRAINT FK_B4F0DBA75F0F2752 FOREIGN KEY (documents_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE search ADD CONSTRAINT FK_B4F0DBA767B3B43D FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE upload ADD CONSTRAINT FK_17BDE61F67B3B43D FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE upload ADD CONSTRAINT FK_17BDE61FC33F7837 FOREIGN KEY (document_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE download DROP CONSTRAINT FK_781A82705F0F2752');
        $this->addSql('ALTER TABLE favori DROP CONSTRAINT FK_EF85A2CC5F0F2752');
        $this->addSql('ALTER TABLE search DROP CONSTRAINT FK_B4F0DBA75F0F2752');
        $this->addSql('ALTER TABLE upload DROP CONSTRAINT FK_17BDE61FC33F7837');
        $this->addSql('ALTER TABLE download DROP CONSTRAINT FK_781A827067B3B43D');
        $this->addSql('ALTER TABLE favori DROP CONSTRAINT FK_EF85A2CC67B3B43D');
        $this->addSql('ALTER TABLE search DROP CONSTRAINT FK_B4F0DBA767B3B43D');
        $this->addSql('ALTER TABLE upload DROP CONSTRAINT FK_17BDE61F67B3B43D');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526C67B3B43D');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526C5F0F2752');
        $this->addSql('ALTER TABLE document DROP CONSTRAINT FK_D8698A7667B3B43D');
        $this->addSql('ALTER TABLE document DROP CONSTRAINT FK_D8698A7612469DE2');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE "user"');
    }
}
