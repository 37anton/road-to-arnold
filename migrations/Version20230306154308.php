<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230306154308 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE enseigne (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle_de_sport (id INT AUTO_INCREMENT NOT NULL, ville_id INT DEFAULT NULL, enseigne_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_D533E789A73F0036 (ville_id), INDEX IDX_D533E7896C2A0A71 (enseigne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE salle_de_sport ADD CONSTRAINT FK_D533E789A73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE salle_de_sport ADD CONSTRAINT FK_D533E7896C2A0A71 FOREIGN KEY (enseigne_id) REFERENCES enseigne (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE salle_de_sport DROP FOREIGN KEY FK_D533E789A73F0036');
        $this->addSql('ALTER TABLE salle_de_sport DROP FOREIGN KEY FK_D533E7896C2A0A71');
        $this->addSql('DROP TABLE enseigne');
        $this->addSql('DROP TABLE salle_de_sport');
        $this->addSql('DROP TABLE ville');
    }
}
