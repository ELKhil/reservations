<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230218203538 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artiste_type_show (id INT AUTO_INCREMENT NOT NULL, artiste_type_id_id INT NOT NULL, show_id_id INT NOT NULL, INDEX IDX_812771F5C52781FA (artiste_type_id_id), INDEX IDX_812771F57DF5FA8B (show_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artiste_type_show ADD CONSTRAINT FK_812771F5C52781FA FOREIGN KEY (artiste_type_id_id) REFERENCES artiste_type (id)');
        $this->addSql('ALTER TABLE artiste_type_show ADD CONSTRAINT FK_812771F57DF5FA8B FOREIGN KEY (show_id_id) REFERENCES shows (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artiste_type_show DROP FOREIGN KEY FK_812771F5C52781FA');
        $this->addSql('ALTER TABLE artiste_type_show DROP FOREIGN KEY FK_812771F57DF5FA8B');
        $this->addSql('DROP TABLE artiste_type_show');
    }
}
