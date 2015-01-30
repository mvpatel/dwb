<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150116035645 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user ADD casket_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_2DA17977C9AEF11 FOREIGN KEY (casket_id) REFERENCES Casket (id)');
        $this->addSql('CREATE INDEX IDX_2DA17977C9AEF11 ON user (casket_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE User DROP FOREIGN KEY FK_2DA17977C9AEF11');
        $this->addSql('DROP INDEX IDX_2DA17977C9AEF11 ON User');
        $this->addSql('ALTER TABLE User DROP casket_id');
    }
}
