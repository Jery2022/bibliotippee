<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240425191926 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE "user" ADD image_name_avatar VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD image_size_avatar INT DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD updated_image_avatar_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('COMMENT ON COLUMN "user".updated_image_avatar_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "user" DROP image_name_avatar');
        $this->addSql('ALTER TABLE "user" DROP image_size_avatar');
        $this->addSql('ALTER TABLE "user" DROP updated_image_avatar_at');
    }
}
