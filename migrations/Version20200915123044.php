<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200915123044 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B2972534008B');
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B2975200282E');
        $this->addSql('DROP INDEX IDX_E6D6B2975200282E ON profil');
        $this->addSql('DROP INDEX IDX_E6D6B2972534008B ON profil');
        $this->addSql('ALTER TABLE profil DROP structure_id, DROP formation_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profil ADD structure_id INT NOT NULL, ADD formation_id INT NOT NULL');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B2972534008B FOREIGN KEY (structure_id) REFERENCES structure (id)');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B2975200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_E6D6B2975200282E ON profil (formation_id)');
        $this->addSql('CREATE INDEX IDX_E6D6B2972534008B ON profil (structure_id)');
    }
}
