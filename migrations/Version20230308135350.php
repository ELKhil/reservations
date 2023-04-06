<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230308135350 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artiste_type DROP FOREIGN KEY FK_141633AA1F48AE04');
        $this->addSql('ALTER TABLE artiste_type DROP FOREIGN KEY FK_141633AA714819A0');
        $this->addSql('DROP INDEX IDX_141633AA1F48AE04 ON artiste_type');
        $this->addSql('DROP INDEX IDX_141633AA714819A0 ON artiste_type');
        $this->addSql('ALTER TABLE artiste_type ADD artist_id INT DEFAULT NULL, ADD type_id INT DEFAULT NULL, DROP artist_id_id, DROP type_id_id');
        $this->addSql('ALTER TABLE artiste_type ADD CONSTRAINT FK_141633AAB7970CF8 FOREIGN KEY (artist_id) REFERENCES artists (id)');
        $this->addSql('ALTER TABLE artiste_type ADD CONSTRAINT FK_141633AAC54C8C93 FOREIGN KEY (type_id) REFERENCES types (id)');
        $this->addSql('CREATE INDEX IDX_141633AAB7970CF8 ON artiste_type (artist_id)');
        $this->addSql('CREATE INDEX IDX_141633AAC54C8C93 ON artiste_type (type_id)');
        $this->addSql('ALTER TABLE artiste_type_show DROP FOREIGN KEY FK_812771F5C52781FA');
        $this->addSql('DROP INDEX IDX_812771F5C52781FA ON artiste_type_show');
        $this->addSql('ALTER TABLE artiste_type_show CHANGE artiste_type_id_id artiste_type_id INT NOT NULL');
        $this->addSql('ALTER TABLE artiste_type_show ADD CONSTRAINT FK_812771F5B211CDF3 FOREIGN KEY (artiste_type_id) REFERENCES artiste_type (id)');
        $this->addSql('CREATE INDEX IDX_812771F5B211CDF3 ON artiste_type_show (artiste_type_id)');
        $this->addSql('ALTER TABLE locations DROP FOREIGN KEY FK_17E64ABABEC99553');
        $this->addSql('DROP INDEX UNIQ_17E64ABABEC99553 ON locations');
        $this->addSql('ALTER TABLE locations CHANGE locality_id_id locality_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE locations ADD CONSTRAINT FK_17E64ABA88823A92 FOREIGN KEY (locality_id) REFERENCES localities (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_17E64ABA88823A92 ON locations (locality_id)');
        $this->addSql('ALTER TABLE representations DROP FOREIGN KEY FK_C90A4017DF5FA8B');
        $this->addSql('ALTER TABLE representations DROP FOREIGN KEY FK_C90A401918DB72');
        $this->addSql('DROP INDEX IDX_C90A4017DF5FA8B ON representations');
        $this->addSql('DROP INDEX IDX_C90A401918DB72 ON representations');
        $this->addSql('ALTER TABLE representations ADD show_id INT DEFAULT NULL, ADD location_id INT DEFAULT NULL, DROP show_id_id, DROP location_id_id');
        $this->addSql('ALTER TABLE representations ADD CONSTRAINT FK_C90A401D0C1FC64 FOREIGN KEY (show_id) REFERENCES shows (id)');
        $this->addSql('ALTER TABLE representations ADD CONSTRAINT FK_C90A40164D218E FOREIGN KEY (location_id) REFERENCES locations (id)');
        $this->addSql('CREATE INDEX IDX_C90A401D0C1FC64 ON representations (show_id)');
        $this->addSql('CREATE INDEX IDX_C90A40164D218E ON representations (location_id)');
        $this->addSql('ALTER TABLE shows DROP FOREIGN KEY FK_6C3BF144918DB72');
        $this->addSql('DROP INDEX UNIQ_6C3BF144918DB72 ON shows');
        $this->addSql('ALTER TABLE shows CHANGE location_id_id location_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE shows ADD CONSTRAINT FK_6C3BF14464D218E FOREIGN KEY (location_id) REFERENCES locations (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6C3BF14464D218E ON shows (location_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE locations DROP FOREIGN KEY FK_17E64ABA88823A92');
        $this->addSql('DROP INDEX UNIQ_17E64ABA88823A92 ON locations');
        $this->addSql('ALTER TABLE locations CHANGE locality_id locality_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE locations ADD CONSTRAINT FK_17E64ABABEC99553 FOREIGN KEY (locality_id_id) REFERENCES localities (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_17E64ABABEC99553 ON locations (locality_id_id)');
        $this->addSql('ALTER TABLE artiste_type DROP FOREIGN KEY FK_141633AAB7970CF8');
        $this->addSql('ALTER TABLE artiste_type DROP FOREIGN KEY FK_141633AAC54C8C93');
        $this->addSql('DROP INDEX IDX_141633AAB7970CF8 ON artiste_type');
        $this->addSql('DROP INDEX IDX_141633AAC54C8C93 ON artiste_type');
        $this->addSql('ALTER TABLE artiste_type ADD artist_id_id INT DEFAULT NULL, ADD type_id_id INT DEFAULT NULL, DROP artist_id, DROP type_id');
        $this->addSql('ALTER TABLE artiste_type ADD CONSTRAINT FK_141633AA1F48AE04 FOREIGN KEY (artist_id_id) REFERENCES artists (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE artiste_type ADD CONSTRAINT FK_141633AA714819A0 FOREIGN KEY (type_id_id) REFERENCES types (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_141633AA1F48AE04 ON artiste_type (artist_id_id)');
        $this->addSql('CREATE INDEX IDX_141633AA714819A0 ON artiste_type (type_id_id)');
        $this->addSql('ALTER TABLE artiste_type_show DROP FOREIGN KEY FK_812771F5B211CDF3');
        $this->addSql('DROP INDEX IDX_812771F5B211CDF3 ON artiste_type_show');
        $this->addSql('ALTER TABLE artiste_type_show CHANGE artiste_type_id artiste_type_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE artiste_type_show ADD CONSTRAINT FK_812771F5C52781FA FOREIGN KEY (artiste_type_id_id) REFERENCES artiste_type (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_812771F5C52781FA ON artiste_type_show (artiste_type_id_id)');
        $this->addSql('ALTER TABLE representations DROP FOREIGN KEY FK_C90A401D0C1FC64');
        $this->addSql('ALTER TABLE representations DROP FOREIGN KEY FK_C90A40164D218E');
        $this->addSql('DROP INDEX IDX_C90A401D0C1FC64 ON representations');
        $this->addSql('DROP INDEX IDX_C90A40164D218E ON representations');
        $this->addSql('ALTER TABLE representations ADD show_id_id INT DEFAULT NULL, ADD location_id_id INT DEFAULT NULL, DROP show_id, DROP location_id');
        $this->addSql('ALTER TABLE representations ADD CONSTRAINT FK_C90A4017DF5FA8B FOREIGN KEY (show_id_id) REFERENCES shows (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE representations ADD CONSTRAINT FK_C90A401918DB72 FOREIGN KEY (location_id_id) REFERENCES locations (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_C90A4017DF5FA8B ON representations (show_id_id)');
        $this->addSql('CREATE INDEX IDX_C90A401918DB72 ON representations (location_id_id)');
        $this->addSql('ALTER TABLE shows DROP FOREIGN KEY FK_6C3BF14464D218E');
        $this->addSql('DROP INDEX UNIQ_6C3BF14464D218E ON shows');
        $this->addSql('ALTER TABLE shows CHANGE location_id location_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE shows ADD CONSTRAINT FK_6C3BF144918DB72 FOREIGN KEY (location_id_id) REFERENCES locations (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6C3BF144918DB72 ON shows (location_id_id)');
    }
}
