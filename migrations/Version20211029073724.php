<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211029073724 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE image_entity (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', originalName VARCHAR(255) NOT NULL, fileName VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, mimeType VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_entity (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', image_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', createdAt DATETIME NOT NULL, title VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_3E0AA00D3DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE post_entity ADD CONSTRAINT FK_3E0AA00D3DA5256D FOREIGN KEY (image_id) REFERENCES image_entity (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post_entity DROP FOREIGN KEY FK_3E0AA00D3DA5256D');
        $this->addSql('DROP TABLE image_entity');
        $this->addSql('DROP TABLE post_entity');
    }
}
