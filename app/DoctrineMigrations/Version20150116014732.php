<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150116014732 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE phone CHANGE mobile mobile VARCHAR(20) NOT NULL, CHANGE home_phone home_phone VARCHAR(20) NOT NULL, CHANGE office_phone office_phone VARCHAR(20) NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Phone CHANGE mobile mobile VARCHAR(12) NOT NULL COLLATE utf8_unicode_ci, CHANGE home_phone home_phone VARCHAR(12) NOT NULL COLLATE utf8_unicode_ci, CHANGE office_phone office_phone VARCHAR(12) NOT NULL COLLATE utf8_unicode_ci');
    }
}
