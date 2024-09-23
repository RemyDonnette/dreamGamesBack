<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240917202818 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game ALTER platform DROP NOT NULL');
        $this->addSql('ALTER TABLE game ALTER is_box DROP NOT NULL');
        $this->addSql('ALTER TABLE game ALTER is_notice DROP NOT NULL');
        $this->addSql('ALTER TABLE game ALTER game_condition DROP NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE game ALTER platform SET NOT NULL');
        $this->addSql('ALTER TABLE game ALTER game_condition SET NOT NULL');
        $this->addSql('ALTER TABLE game ALTER is_box SET NOT NULL');
        $this->addSql('ALTER TABLE game ALTER is_notice SET NOT NULL');
    }
}
