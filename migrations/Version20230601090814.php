<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230601090814 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, genre VARCHAR(255) NOT NULL, bio LONGTEXT NOT NULL, dtype VARCHAR(255) NOT NULL, prix_horaire INT DEFAULT NULL, UNIQUE INDEX UNIQ_C7440455E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enseigne (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle_de_sport (id INT AUTO_INCREMENT NOT NULL, ville_id INT DEFAULT NULL, enseigne_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_D533E789A73F0036 (ville_id), INDEX IDX_D533E7896C2A0A71 (enseigne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE salle_de_sport ADD CONSTRAINT FK_D533E789A73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE salle_de_sport ADD CONSTRAINT FK_D533E7896C2A0A71 FOREIGN KEY (enseigne_id) REFERENCES enseigne (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE salle_de_sport DROP FOREIGN KEY FK_D533E789A73F0036');
        $this->addSql('ALTER TABLE salle_de_sport DROP FOREIGN KEY FK_D533E7896C2A0A71');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE enseigne');
        $this->addSql('DROP TABLE salle_de_sport');
        $this->addSql('DROP TABLE ville');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
