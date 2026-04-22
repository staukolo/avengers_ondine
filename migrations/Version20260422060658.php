<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260422060658 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse DROP code_postal');
        $this->addSql('ALTER TABLE employe ADD CONSTRAINT FK_F804D3B94DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F9960BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id)');
        $this->addSql('ALTER TABLE marquepage_mot_cle ADD CONSTRAINT FK_336E8830F98C4D8E FOREIGN KEY (marquepage_id) REFERENCES marquepage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE marquepage_mot_cle ADD CONSTRAINT FK_336E8830FE94535C FOREIGN KEY (mot_cle_id) REFERENCES mot_cle (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse ADD code_postal VARCHAR(10) NOT NULL');
        $this->addSql('ALTER TABLE employe DROP FOREIGN KEY FK_F804D3B94DE7DC5C');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F9960BB6FE6');
        $this->addSql('ALTER TABLE marquepage_mot_cle DROP FOREIGN KEY FK_336E8830F98C4D8E');
        $this->addSql('ALTER TABLE marquepage_mot_cle DROP FOREIGN KEY FK_336E8830FE94535C');
    }
}
