<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230422140617 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artiste_type_show DROP FOREIGN KEY FK_812771F5D0C1FC64');
        $this->addSql('DROP TABLE artiste_type_show');
        $this->addSql('ALTER TABLE artist_type DROP FOREIGN KEY FK_3060D1B6B7970CF8');
        $this->addSql('ALTER TABLE artist_type DROP FOREIGN KEY FK_3060D1B6C54C8C93');
        $this->addSql('ALTER TABLE artist_type ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE artist_type ADD CONSTRAINT FK_3060D1B6B7970CF8 FOREIGN KEY (artist_id) REFERENCES artists (id)');
        $this->addSql('ALTER TABLE artist_type ADD CONSTRAINT FK_3060D1B6C54C8C93 FOREIGN KEY (type_id) REFERENCES types (id)');
        $this->addSql('CREATE UNIQUE INDEX artist_type_idx ON artist_type (artist_id, type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artiste_type_show (id INT AUTO_INCREMENT NOT NULL, show_id INT NOT NULL, INDEX IDX_812771F5D0C1FC64 (show_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE artiste_type_show ADD CONSTRAINT FK_812771F5D0C1FC64 FOREIGN KEY (show_id) REFERENCES shows (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE artist_type MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE artist_type DROP FOREIGN KEY FK_3060D1B6B7970CF8');
        $this->addSql('ALTER TABLE artist_type DROP FOREIGN KEY FK_3060D1B6C54C8C93');
        $this->addSql('DROP INDEX artist_type_idx ON artist_type');
        $this->addSql('DROP INDEX `PRIMARY` ON artist_type');
        $this->addSql('ALTER TABLE artist_type DROP id');
        $this->addSql('ALTER TABLE artist_type ADD CONSTRAINT FK_3060D1B6B7970CF8 FOREIGN KEY (artist_id) REFERENCES artists (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist_type ADD CONSTRAINT FK_3060D1B6C54C8C93 FOREIGN KEY (type_id) REFERENCES types (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist_type ADD PRIMARY KEY (artist_id, type_id)');
    }
}
