<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230308134607 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artiste_type_show DROP FOREIGN KEY FK_812771F57DF5FA8B');
        $this->addSql('DROP INDEX IDX_812771F57DF5FA8B ON artiste_type_show');
        $this->addSql('ALTER TABLE artiste_type_show CHANGE show_id_id show_id INT NOT NULL');
        $this->addSql('ALTER TABLE artiste_type_show ADD CONSTRAINT FK_812771F5D0C1FC64 FOREIGN KEY (show_id) REFERENCES shows (id)');
        $this->addSql('CREATE INDEX IDX_812771F5D0C1FC64 ON artiste_type_show (show_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artiste_type_show DROP FOREIGN KEY FK_812771F5D0C1FC64');
        $this->addSql('DROP INDEX IDX_812771F5D0C1FC64 ON artiste_type_show');
        $this->addSql('ALTER TABLE artiste_type_show CHANGE show_id show_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE artiste_type_show ADD CONSTRAINT FK_812771F57DF5FA8B FOREIGN KEY (show_id_id) REFERENCES shows (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_812771F57DF5FA8B ON artiste_type_show (show_id_id)');
    }
}
