<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210526152721 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE season DROP FOREIGN KEY FK_F0E45BA9E12DEDA1');
        $this->addSql('DROP INDEX IDX_F0E45BA9E12DEDA1 ON season');
        $this->addSql('ALTER TABLE season CHANGE program_id_id programs_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE season ADD CONSTRAINT FK_F0E45BA979AEC3C FOREIGN KEY (programs_id) REFERENCES program (id)');
        $this->addSql('CREATE INDEX IDX_F0E45BA979AEC3C ON season (programs_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE season DROP FOREIGN KEY FK_F0E45BA979AEC3C');
        $this->addSql('DROP INDEX IDX_F0E45BA979AEC3C ON season');
        $this->addSql('ALTER TABLE season CHANGE programs_id program_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE season ADD CONSTRAINT FK_F0E45BA9E12DEDA1 FOREIGN KEY (program_id_id) REFERENCES program (id)');
        $this->addSql('CREATE INDEX IDX_F0E45BA9E12DEDA1 ON season (program_id_id)');
    }
}