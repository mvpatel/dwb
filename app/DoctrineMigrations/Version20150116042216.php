<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150116042216 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE connecteduser ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE connecteduser ADD CONSTRAINT FK_F0A0BFE7A76ED395 FOREIGN KEY (user_id) REFERENCES User (id)');
        $this->addSql('CREATE INDEX IDX_F0A0BFE7A76ED395 ON connecteduser (user_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ConnectedUser DROP FOREIGN KEY FK_F0A0BFE7A76ED395');
        $this->addSql('DROP INDEX IDX_F0A0BFE7A76ED395 ON ConnectedUser');
        $this->addSql('ALTER TABLE ConnectedUser DROP user_id');
    }
}
