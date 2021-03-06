<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170127165939 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__Test AS SELECT id, StringField, NumberField FROM Test');
        $this->addSql('DROP TABLE Test');
        $this->addSql('CREATE TABLE Test (id INTEGER NOT NULL, StringField CLOB NOT NULL, NumberField DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO Test (id, StringField, NumberField) SELECT id, StringField, NumberField FROM __temp__Test');
        $this->addSql('DROP TABLE __temp__Test');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__Test AS SELECT id, StringField, NumberField FROM Test');
        $this->addSql('DROP TABLE Test');
        $this->addSql('CREATE TABLE Test (id INTEGER NOT NULL, StringField CLOB DEFAULT \'NULL\' NOT NULL COLLATE BINARY, NumberField DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO Test (id, StringField, NumberField) SELECT id, StringField, NumberField FROM __temp__Test');
        $this->addSql('DROP TABLE __temp__Test');
    }
}
