<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230308151147 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE roles DROP FOREIGN KEY FK_B63E2EC71BA3766E');
        $this->addSql('DROP INDEX IDX_B63E2EC71BA3766E ON roles');
        $this->addSql('ALTER TABLE roles DROP role_user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE roles ADD role_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE roles ADD CONSTRAINT FK_B63E2EC71BA3766E FOREIGN KEY (role_user_id) REFERENCES role_user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_B63E2EC71BA3766E ON roles (role_user_id)');
    }
}
