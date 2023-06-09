<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230308134413 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE localities (id INT AUTO_INCREMENT NOT NULL, postal_code VARCHAR(10) DEFAULT NULL, locality VARCHAR(60) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE locations ADD locality_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE locations ADD CONSTRAINT FK_17E64ABABEC99553 FOREIGN KEY (locality_id_id) REFERENCES localities (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_17E64ABABEC99553 ON locations (locality_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE locations DROP FOREIGN KEY FK_17E64ABABEC99553');
        $this->addSql('DROP TABLE localities');
        $this->addSql('DROP INDEX UNIQ_17E64ABABEC99553 ON locations');
        $this->addSql('ALTER TABLE locations DROP locality_id_id');
    }
}
