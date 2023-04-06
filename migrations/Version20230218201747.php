<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230218201747 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artiste_type (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artiste_type_artists (artiste_type_id INT NOT NULL, artists_id INT NOT NULL, INDEX IDX_FE72F52CB211CDF3 (artiste_type_id), INDEX IDX_FE72F52C54A05007 (artists_id), PRIMARY KEY(artiste_type_id, artists_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artiste_type_types (artiste_type_id INT NOT NULL, types_id INT NOT NULL, INDEX IDX_E353969DB211CDF3 (artiste_type_id), INDEX IDX_E353969D8EB23357 (types_id), PRIMARY KEY(artiste_type_id, types_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artiste_type_artists ADD CONSTRAINT FK_FE72F52CB211CDF3 FOREIGN KEY (artiste_type_id) REFERENCES artiste_type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artiste_type_artists ADD CONSTRAINT FK_FE72F52C54A05007 FOREIGN KEY (artists_id) REFERENCES artists (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artiste_type_types ADD CONSTRAINT FK_E353969DB211CDF3 FOREIGN KEY (artiste_type_id) REFERENCES artiste_type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artiste_type_types ADD CONSTRAINT FK_E353969D8EB23357 FOREIGN KEY (types_id) REFERENCES types (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artiste_type_artists DROP FOREIGN KEY FK_FE72F52CB211CDF3');
        $this->addSql('ALTER TABLE artiste_type_artists DROP FOREIGN KEY FK_FE72F52C54A05007');
        $this->addSql('ALTER TABLE artiste_type_types DROP FOREIGN KEY FK_E353969DB211CDF3');
        $this->addSql('ALTER TABLE artiste_type_types DROP FOREIGN KEY FK_E353969D8EB23357');
        $this->addSql('DROP TABLE artiste_type');
        $this->addSql('DROP TABLE artiste_type_artists');
        $this->addSql('DROP TABLE artiste_type_types');
    }
}
