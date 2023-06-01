<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230601133517 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rendez_vous ADD coach_id INT DEFAULT NULL, ADD debutant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A3C105691 FOREIGN KEY (coach_id) REFERENCES coach (id)');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0AAAB167B6 FOREIGN KEY (debutant_id) REFERENCES debutant (id)');
        $this->addSql('CREATE INDEX IDX_65E8AA0A3C105691 ON rendez_vous (coach_id)');
        $this->addSql('CREATE INDEX IDX_65E8AA0AAAB167B6 ON rendez_vous (debutant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0A3C105691');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0AAAB167B6');
        $this->addSql('DROP INDEX IDX_65E8AA0A3C105691 ON rendez_vous');
        $this->addSql('DROP INDEX IDX_65E8AA0AAAB167B6 ON rendez_vous');
        $this->addSql('ALTER TABLE rendez_vous DROP coach_id, DROP debutant_id');
    }
}
