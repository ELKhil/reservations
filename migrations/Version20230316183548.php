<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230316183548 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE locations ADD slug VARCHAR(255) DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_17E64ABA989D9B62 ON locations (slug)');
        $this->addSql('ALTER TABLE shows ADD bookable TINYINT(1) DEFAULT NULL, ADD price NUMERIC(10, 0) DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6C3BF144989D9B62 ON shows (slug)');
        $this->addSql('ALTER TABLE users DROP roles');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_6C3BF144989D9B62 ON shows');
        $this->addSql('ALTER TABLE shows DROP bookable, DROP price');
        $this->addSql('DROP INDEX UNIQ_17E64ABA989D9B62 ON locations');
        $this->addSql('ALTER TABLE locations DROP slug');
        $this->addSql('ALTER TABLE users ADD roles JSON NOT NULL');
    }
}
