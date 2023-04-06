<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230308133639 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shows ADD location_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE shows ADD CONSTRAINT FK_6C3BF144918DB72 FOREIGN KEY (location_id_id) REFERENCES locations (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6C3BF144918DB72 ON shows (location_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shows DROP FOREIGN KEY FK_6C3BF144918DB72');
        $this->addSql('DROP INDEX UNIQ_6C3BF144918DB72 ON shows');
        $this->addSql('ALTER TABLE shows DROP location_id_id');
    }
}
