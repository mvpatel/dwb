<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150116024154 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user ADD address_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_2DA17977F5B7AF75 FOREIGN KEY (address_id) REFERENCES Address (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2DA17977F5B7AF75 ON user (address_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE User DROP FOREIGN KEY FK_2DA17977F5B7AF75');
        $this->addSql('DROP INDEX UNIQ_2DA17977F5B7AF75 ON User');
        $this->addSql('ALTER TABLE User DROP address_id');
    }
}
