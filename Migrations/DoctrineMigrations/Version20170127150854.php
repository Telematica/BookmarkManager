<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170127150854 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__Test AS SELECT id FROM Test');
        $this->addSql('DROP TABLE Test');
        $this->addSql('CREATE TABLE Test (id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO Test (id) SELECT id FROM __temp__Test');
        $this->addSql('DROP TABLE __temp__Test');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('ALTER TABLE Test ADD COLUMN StringField CLOB DEFAULT \'NULL\' NOT NULL COLLATE BINARY');
    }
}
