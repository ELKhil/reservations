<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230308131337 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE representations ADD show_id_id INT DEFAULT NULL, ADD location_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE representations ADD CONSTRAINT FK_C90A4017DF5FA8B FOREIGN KEY (show_id_id) REFERENCES shows (id)');
        $this->addSql('ALTER TABLE representations ADD CONSTRAINT FK_C90A401918DB72 FOREIGN KEY (location_id_id) REFERENCES locations (id)');
        $this->addSql('CREATE INDEX IDX_C90A4017DF5FA8B ON representations (show_id_id)');
        $this->addSql('CREATE INDEX IDX_C90A401918DB72 ON representations (location_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE representations DROP FOREIGN KEY FK_C90A4017DF5FA8B');
        $this->addSql('ALTER TABLE representations DROP FOREIGN KEY FK_C90A401918DB72');
        $this->addSql('DROP INDEX IDX_C90A4017DF5FA8B ON representations');
        $this->addSql('DROP INDEX IDX_C90A401918DB72 ON representations');
        $this->addSql('ALTER TABLE representations DROP show_id_id, DROP location_id_id');
    }
}
