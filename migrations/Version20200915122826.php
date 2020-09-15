<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200915122826 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parcours ADD structure_id INT NOT NULL, ADD formation_id INT NOT NULL');
        $this->addSql('ALTER TABLE parcours ADD CONSTRAINT FK_99B1DEE32534008B FOREIGN KEY (structure_id) REFERENCES structure (id)');
        $this->addSql('ALTER TABLE parcours ADD CONSTRAINT FK_99B1DEE35200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_99B1DEE32534008B ON parcours (structure_id)');
        $this->addSql('CREATE INDEX IDX_99B1DEE35200282E ON parcours (formation_id)');
        $this->addSql('ALTER TABLE profil ADD structure_id INT NOT NULL, ADD formation_id INT NOT NULL');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B2972534008B FOREIGN KEY (structure_id) REFERENCES structure (id)');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B2975200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_E6D6B2972534008B ON profil (structure_id)');
        $this->addSql('CREATE INDEX IDX_E6D6B2975200282E ON profil (formation_id)');
        $this->addSql('ALTER TABLE prospect ADD profil_id INT NOT NULL, ADD parcours_id INT NOT NULL, ADD connu_par_id INT NOT NULL, ADD membre_id INT NOT NULL, ADD etape_id INT NOT NULL');
        $this->addSql('ALTER TABLE prospect ADD CONSTRAINT FK_C9CE8C7D275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE prospect ADD CONSTRAINT FK_C9CE8C7D6E38C0DB FOREIGN KEY (parcours_id) REFERENCES parcours (id)');
        $this->addSql('ALTER TABLE prospect ADD CONSTRAINT FK_C9CE8C7D7AD1553F FOREIGN KEY (connu_par_id) REFERENCES connu_par (id)');
        $this->addSql('ALTER TABLE prospect ADD CONSTRAINT FK_C9CE8C7D6A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id)');
        $this->addSql('ALTER TABLE prospect ADD CONSTRAINT FK_C9CE8C7D4A8CA2AD FOREIGN KEY (etape_id) REFERENCES etape (id)');
        $this->addSql('CREATE INDEX IDX_C9CE8C7D275ED078 ON prospect (profil_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C9CE8C7D6E38C0DB ON prospect (parcours_id)');
        $this->addSql('CREATE INDEX IDX_C9CE8C7D7AD1553F ON prospect (connu_par_id)');
        $this->addSql('CREATE INDEX IDX_C9CE8C7D6A99F74A ON prospect (membre_id)');
        $this->addSql('CREATE INDEX IDX_C9CE8C7D4A8CA2AD ON prospect (etape_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parcours DROP FOREIGN KEY FK_99B1DEE32534008B');
        $this->addSql('ALTER TABLE parcours DROP FOREIGN KEY FK_99B1DEE35200282E');
        $this->addSql('DROP INDEX IDX_99B1DEE32534008B ON parcours');
        $this->addSql('DROP INDEX IDX_99B1DEE35200282E ON parcours');
        $this->addSql('ALTER TABLE parcours DROP structure_id, DROP formation_id');
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B2972534008B');
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B2975200282E');
        $this->addSql('DROP INDEX IDX_E6D6B2972534008B ON profil');
        $this->addSql('DROP INDEX IDX_E6D6B2975200282E ON profil');
        $this->addSql('ALTER TABLE profil DROP structure_id, DROP formation_id');
        $this->addSql('ALTER TABLE prospect DROP FOREIGN KEY FK_C9CE8C7D275ED078');
        $this->addSql('ALTER TABLE prospect DROP FOREIGN KEY FK_C9CE8C7D6E38C0DB');
        $this->addSql('ALTER TABLE prospect DROP FOREIGN KEY FK_C9CE8C7D7AD1553F');
        $this->addSql('ALTER TABLE prospect DROP FOREIGN KEY FK_C9CE8C7D6A99F74A');
        $this->addSql('ALTER TABLE prospect DROP FOREIGN KEY FK_C9CE8C7D4A8CA2AD');
        $this->addSql('DROP INDEX IDX_C9CE8C7D275ED078 ON prospect');
        $this->addSql('DROP INDEX UNIQ_C9CE8C7D6E38C0DB ON prospect');
        $this->addSql('DROP INDEX IDX_C9CE8C7D7AD1553F ON prospect');
        $this->addSql('DROP INDEX IDX_C9CE8C7D6A99F74A ON prospect');
        $this->addSql('DROP INDEX IDX_C9CE8C7D4A8CA2AD ON prospect');
        $this->addSql('ALTER TABLE prospect DROP profil_id, DROP parcours_id, DROP connu_par_id, DROP membre_id, DROP etape_id');
    }
}
