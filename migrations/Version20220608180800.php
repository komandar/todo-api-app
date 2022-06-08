<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220608180800 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE todo_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE todo_task_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE todo (id INT NOT NULL, name VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE todo_task (id INT NOT NULL, todo_id INT NOT NULL, name VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_DAFBD3AEA1EBC33 ON todo_task (todo_id)');
        $this->addSql('ALTER TABLE todo_task ADD CONSTRAINT FK_DAFBD3AEA1EBC33 FOREIGN KEY (todo_id) REFERENCES todo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE todo_task DROP CONSTRAINT FK_DAFBD3AEA1EBC33');
        $this->addSql('DROP SEQUENCE todo_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE todo_task_id_seq CASCADE');
        $this->addSql('DROP TABLE todo');
        $this->addSql('DROP TABLE todo_task');
    }
}
