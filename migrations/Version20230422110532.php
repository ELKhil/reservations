<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230422110532 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE representation_user DROP FOREIGN KEY FK_979840A446CE82F4');
        $this->addSql('ALTER TABLE representations DROP FOREIGN KEY FK_C90A40164D218E');
        $this->addSql('ALTER TABLE representations DROP FOREIGN KEY FK_C90A401D0C1FC64');
        $this->addSql('DROP TABLE representations');
        $this->addSql('DROP INDEX IDX_979840A446CE82F4 ON representation_user');
        $this->addSql('ALTER TABLE representation_user DROP representation_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE representations (id INT AUTO_INCREMENT NOT NULL, show_id INT DEFAULT NULL, location_id INT DEFAULT NULL, whene DATETIME NOT NULL, INDEX IDX_C90A401D0C1FC64 (show_id), INDEX IDX_C90A40164D218E (location_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE representations ADD CONSTRAINT FK_C90A40164D218E FOREIGN KEY (location_id) REFERENCES locations (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE representations ADD CONSTRAINT FK_C90A401D0C1FC64 FOREIGN KEY (show_id) REFERENCES shows (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE representation_user ADD representation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE representation_user ADD CONSTRAINT FK_979840A446CE82F4 FOREIGN KEY (representation_id) REFERENCES representations (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_979840A446CE82F4 ON representation_user (representation_id)');
    }
}
