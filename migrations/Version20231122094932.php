<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231122094932 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE private_response_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE private_response (id INT NOT NULL, author_id INT NOT NULL, private_message_id INT NOT NULL, content TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_99EDD456F675F31B ON private_response (author_id)');
        $this->addSql('CREATE INDEX IDX_99EDD4565EBFB95E ON private_response (private_message_id)');
        $this->addSql('ALTER TABLE private_response ADD CONSTRAINT FK_99EDD456F675F31B FOREIGN KEY (author_id) REFERENCES profile (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE private_response ADD CONSTRAINT FK_99EDD4565EBFB95E FOREIGN KEY (private_message_id) REFERENCES private_message (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE private_response_id_seq CASCADE');
        $this->addSql('ALTER TABLE private_response DROP CONSTRAINT FK_99EDD456F675F31B');
        $this->addSql('ALTER TABLE private_response DROP CONSTRAINT FK_99EDD4565EBFB95E');
        $this->addSql('DROP TABLE private_response');
    }
}
