<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260316003038 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE marquepage_mot_cle (marquepage_id INT NOT NULL, mot_cle_id INT NOT NULL, INDEX IDX_336E8830F98C4D8E (marquepage_id), INDEX IDX_336E8830FE94535C (mot_cle_id), PRIMARY KEY (marquepage_id, mot_cle_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE mot_cle (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE marquepage_mot_cle ADD CONSTRAINT FK_336E8830F98C4D8E FOREIGN KEY (marquepage_id) REFERENCES marquepage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE marquepage_mot_cle ADD CONSTRAINT FK_336E8830FE94535C FOREIGN KEY (mot_cle_id) REFERENCES mot_cle (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE marquepage_mot_cle DROP FOREIGN KEY FK_336E8830F98C4D8E');
        $this->addSql('ALTER TABLE marquepage_mot_cle DROP FOREIGN KEY FK_336E8830FE94535C');
        $this->addSql('DROP TABLE marquepage_mot_cle');
        $this->addSql('DROP TABLE mot_cle');
    }
}
