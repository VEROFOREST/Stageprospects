<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200921064936 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation ADD duree VARCHAR(255) DEFAULT NULL, ADD contenu_formation LONGTEXT DEFAULT NULL, ADD lieu_formation VARCHAR(255) DEFAULT NULL, ADD cout_formation VARCHAR(255) DEFAULT NULL, DROP date_session1, DROP date_session2');
        $this->addSql('ALTER TABLE prospect CHANGE date_naissance date_naissance DATE DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation ADD date_session1 DATETIME DEFAULT NULL, ADD date_session2 DATETIME DEFAULT NULL, DROP duree, DROP contenu_formation, DROP lieu_formation, DROP cout_formation');
        $this->addSql('ALTER TABLE prospect CHANGE date_naissance date_naissance VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
