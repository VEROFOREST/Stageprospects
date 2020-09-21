<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200921072356 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categ_formation (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charge_de (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE financement (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pre_inscription (id INT AUTO_INCREMENT NOT NULL, prospect_id INT NOT NULL, parcours_id INT NOT NULL, categ_formation_id INT NOT NULL, charge_de_id INT NOT NULL, financement_id INT NOT NULL, UNIQUE INDEX UNIQ_B2AA45A9D182060A (prospect_id), UNIQUE INDEX UNIQ_B2AA45A96E38C0DB (parcours_id), INDEX IDX_B2AA45A9AC46B28 (categ_formation_id), INDEX IDX_B2AA45A9294C31AB (charge_de_id), INDEX IDX_B2AA45A9A737ED74 (financement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pre_inscription ADD CONSTRAINT FK_B2AA45A9D182060A FOREIGN KEY (prospect_id) REFERENCES prospect (id)');
        $this->addSql('ALTER TABLE pre_inscription ADD CONSTRAINT FK_B2AA45A96E38C0DB FOREIGN KEY (parcours_id) REFERENCES parcours (id)');
        $this->addSql('ALTER TABLE pre_inscription ADD CONSTRAINT FK_B2AA45A9AC46B28 FOREIGN KEY (categ_formation_id) REFERENCES categ_formation (id)');
        $this->addSql('ALTER TABLE pre_inscription ADD CONSTRAINT FK_B2AA45A9294C31AB FOREIGN KEY (charge_de_id) REFERENCES charge_de (id)');
        $this->addSql('ALTER TABLE pre_inscription ADD CONSTRAINT FK_B2AA45A9A737ED74 FOREIGN KEY (financement_id) REFERENCES financement (id)');
        $this->addSql('ALTER TABLE formation ADD session_formation_id INT NOT NULL, ADD mat_supp TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF9C9D95AF FOREIGN KEY (session_formation_id) REFERENCES session_formation (id)');
        $this->addSql('CREATE INDEX IDX_404021BF9C9D95AF ON formation (session_formation_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pre_inscription DROP FOREIGN KEY FK_B2AA45A9AC46B28');
        $this->addSql('ALTER TABLE pre_inscription DROP FOREIGN KEY FK_B2AA45A9294C31AB');
        $this->addSql('ALTER TABLE pre_inscription DROP FOREIGN KEY FK_B2AA45A9A737ED74');
        $this->addSql('DROP TABLE categ_formation');
        $this->addSql('DROP TABLE charge_de');
        $this->addSql('DROP TABLE financement');
        $this->addSql('DROP TABLE pre_inscription');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF9C9D95AF');
        $this->addSql('DROP INDEX IDX_404021BF9C9D95AF ON formation');
        $this->addSql('ALTER TABLE formation DROP session_formation_id, DROP mat_supp');
    }
}
