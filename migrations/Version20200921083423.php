<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200921083423 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pre_inscription (id INT AUTO_INCREMENT NOT NULL, prospect_id INT NOT NULL, charge_de_id INT NOT NULL, categ_formation_id INT NOT NULL, financement_id INT NOT NULL, created_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_B2AA45A9D182060A (prospect_id), INDEX IDX_B2AA45A9294C31AB (charge_de_id), INDEX IDX_B2AA45A9AC46B28 (categ_formation_id), INDEX IDX_B2AA45A9A737ED74 (financement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pre_inscription ADD CONSTRAINT FK_B2AA45A9D182060A FOREIGN KEY (prospect_id) REFERENCES prospect (id)');
        $this->addSql('ALTER TABLE pre_inscription ADD CONSTRAINT FK_B2AA45A9294C31AB FOREIGN KEY (charge_de_id) REFERENCES charge_de (id)');
        $this->addSql('ALTER TABLE pre_inscription ADD CONSTRAINT FK_B2AA45A9AC46B28 FOREIGN KEY (categ_formation_id) REFERENCES categ_formation (id)');
        $this->addSql('ALTER TABLE pre_inscription ADD CONSTRAINT FK_B2AA45A9A737ED74 FOREIGN KEY (financement_id) REFERENCES financement (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE pre_inscription');
    }
}
