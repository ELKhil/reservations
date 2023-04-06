<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230218203114 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artiste_type ADD artist_id_id INT DEFAULT NULL, ADD type_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE artiste_type ADD CONSTRAINT FK_141633AA1F48AE04 FOREIGN KEY (artist_id_id) REFERENCES artists (id)');
        $this->addSql('ALTER TABLE artiste_type ADD CONSTRAINT FK_141633AA714819A0 FOREIGN KEY (type_id_id) REFERENCES types (id)');
        $this->addSql('CREATE INDEX IDX_141633AA1F48AE04 ON artiste_type (artist_id_id)');
        $this->addSql('CREATE INDEX IDX_141633AA714819A0 ON artiste_type (type_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artiste_type DROP FOREIGN KEY FK_141633AA1F48AE04');
        $this->addSql('ALTER TABLE artiste_type DROP FOREIGN KEY FK_141633AA714819A0');
        $this->addSql('DROP INDEX IDX_141633AA1F48AE04 ON artiste_type');
        $this->addSql('DROP INDEX IDX_141633AA714819A0 ON artiste_type');
        $this->addSql('ALTER TABLE artiste_type DROP artist_id_id, DROP type_id_id');
    }
}
