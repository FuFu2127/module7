<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250307091522 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, service_id INTEGER DEFAULT NULL, employe_id INTEGER DEFAULT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, telephone INTEGER NOT NULL, email VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, poste VARCHAR(255) NOT NULL, salaire INTEGER NOT NULL, dt_naissance DATETIME NOT NULL, isactive BOOLEAN NOT NULL, CONSTRAINT FK_F804D3B9ED5CA9E6 FOREIGN KEY (service_id) REFERENCES employe (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_F804D3B91B65292 FOREIGN KEY (employe_id) REFERENCES service (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F804D3B9ED5CA9E6 ON employe (service_id)');
        $this->addSql('CREATE INDEX IDX_F804D3B91B65292 ON employe (employe_id)');
        $this->addSql('CREATE TABLE service (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, employe_id INTEGER DEFAULT NULL, nom VARCHAR(255) NOT NULL, description CLOB NOT NULL, dt_creation DATETIME NOT NULL, CONSTRAINT FK_E19D9AD21B65292 FOREIGN KEY (employe_id) REFERENCES employe (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E19D9AD21B65292 ON service (employe_id)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , available_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , delivered_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE employe');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
