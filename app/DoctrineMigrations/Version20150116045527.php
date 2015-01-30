<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150116045527 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE connecteduser ADD phone_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE connecteduser ADD CONSTRAINT FK_F0A0BFE73B7323CB FOREIGN KEY (phone_id) REFERENCES Phone (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F0A0BFE73B7323CB ON connecteduser (phone_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ConnectedUser DROP FOREIGN KEY FK_F0A0BFE73B7323CB');
        $this->addSql('DROP INDEX UNIQ_F0A0BFE73B7323CB ON ConnectedUser');
        $this->addSql('ALTER TABLE ConnectedUser DROP phone_id');
    }
}
