<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150116050345 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE connecteduser ADD address_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE connecteduser ADD CONSTRAINT FK_F0A0BFE7F5B7AF75 FOREIGN KEY (address_id) REFERENCES Address (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F0A0BFE7F5B7AF75 ON connecteduser (address_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ConnectedUser DROP FOREIGN KEY FK_F0A0BFE7F5B7AF75');
        $this->addSql('DROP INDEX UNIQ_F0A0BFE7F5B7AF75 ON ConnectedUser');
        $this->addSql('ALTER TABLE ConnectedUser DROP address_id');
    }
}
