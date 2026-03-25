<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260324033402 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE caillou (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, photo VARCHAR(255) DEFAULT NULL, categorie VARCHAR(50) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F9960BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id)');
        $this->addSql('ALTER TABLE marquepage_mot_cle ADD CONSTRAINT FK_336E8830F98C4D8E FOREIGN KEY (marquepage_id) REFERENCES marquepage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE marquepage_mot_cle ADD CONSTRAINT FK_336E8830FE94535C FOREIGN KEY (mot_cle_id) REFERENCES mot_cle (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE caillou');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F9960BB6FE6');
        $this->addSql('ALTER TABLE marquepage_mot_cle DROP FOREIGN KEY FK_336E8830F98C4D8E');
        $this->addSql('ALTER TABLE marquepage_mot_cle DROP FOREIGN KEY FK_336E8830FE94535C');
    }
}
