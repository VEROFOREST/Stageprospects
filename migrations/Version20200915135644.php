<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200915135644 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prospect CHANGE parcours_id parcours_id INT DEFAULT NULL, CHANGE connu_par_id connu_par_id INT DEFAULT NULL, CHANGE membre_id membre_id INT DEFAULT NULL, CHANGE etape_id etape_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prospect CHANGE parcours_id parcours_id INT NOT NULL, CHANGE connu_par_id connu_par_id INT NOT NULL, CHANGE membre_id membre_id INT NOT NULL, CHANGE etape_id etape_id INT NOT NULL');
    }
}
