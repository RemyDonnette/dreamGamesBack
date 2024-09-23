<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240916154257 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE game_id_seq CASCADE');
        $this->addSql('DROP TABLE game');
        $this->addSql('ALTER TABLE "user" DROP favorites');
        $this->addSql('ALTER TABLE "user" DROP pseudo');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE game_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE game (id INT NOT NULL, id_rawg INT NOT NULL, platform VARCHAR(255) NOT NULL, general_condition VARCHAR(255) NOT NULL, box_presence BOOLEAN NOT NULL, notice_presence BOOLEAN NOT NULL, is_available BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE "user" ADD favorites JSON NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD pseudo VARCHAR(255) NOT NULL');
    }
}
