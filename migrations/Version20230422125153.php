<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230422125153 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artiste_type_show DROP FOREIGN KEY FK_812771F5B211CDF3');
        $this->addSql('CREATE TABLE artist_type (artist_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_3060D1B6B7970CF8 (artist_id), INDEX IDX_3060D1B6C54C8C93 (type_id), PRIMARY KEY(artist_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artist_type ADD CONSTRAINT FK_3060D1B6B7970CF8 FOREIGN KEY (artist_id) REFERENCES artists (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist_type ADD CONSTRAINT FK_3060D1B6C54C8C93 FOREIGN KEY (type_id) REFERENCES types (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artiste_type DROP FOREIGN KEY FK_141633AAB7970CF8');
        $this->addSql('ALTER TABLE artiste_type DROP FOREIGN KEY FK_141633AAC54C8C93');
        $this->addSql('DROP TABLE artiste_type');
        $this->addSql('DROP INDEX IDX_812771F5B211CDF3 ON artiste_type_show');
        $this->addSql('ALTER TABLE artiste_type_show DROP artiste_type_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artiste_type (id INT AUTO_INCREMENT NOT NULL, artist_id INT DEFAULT NULL, type_id INT DEFAULT NULL, INDEX IDX_141633AAB7970CF8 (artist_id), INDEX IDX_141633AAC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE artiste_type ADD CONSTRAINT FK_141633AAB7970CF8 FOREIGN KEY (artist_id) REFERENCES artists (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE artiste_type ADD CONSTRAINT FK_141633AAC54C8C93 FOREIGN KEY (type_id) REFERENCES types (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE artist_type DROP FOREIGN KEY FK_3060D1B6B7970CF8');
        $this->addSql('ALTER TABLE artist_type DROP FOREIGN KEY FK_3060D1B6C54C8C93');
        $this->addSql('DROP TABLE artist_type');
        $this->addSql('ALTER TABLE artiste_type_show ADD artiste_type_id INT NOT NULL');
        $this->addSql('ALTER TABLE artiste_type_show ADD CONSTRAINT FK_812771F5B211CDF3 FOREIGN KEY (artiste_type_id) REFERENCES artiste_type (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_812771F5B211CDF3 ON artiste_type_show (artiste_type_id)');
    }
}
