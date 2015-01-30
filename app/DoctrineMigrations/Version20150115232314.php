<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150115232314 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE phone ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE phone ADD CONSTRAINT FK_858EB8D9A76ED395 FOREIGN KEY (user_id) REFERENCES User (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_858EB8D9A76ED395 ON phone (user_id)');
        $this->addSql('ALTER TABLE user ADD phone_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_2DA179773B7323CB FOREIGN KEY (phone_id) REFERENCES Phone (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2DA179773B7323CB ON user (phone_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Phone DROP FOREIGN KEY FK_858EB8D9A76ED395');
        $this->addSql('DROP INDEX UNIQ_858EB8D9A76ED395 ON Phone');
        $this->addSql('ALTER TABLE Phone DROP user_id');
        $this->addSql('ALTER TABLE User DROP FOREIGN KEY FK_2DA179773B7323CB');
        $this->addSql('DROP INDEX UNIQ_2DA179773B7323CB ON User');
        $this->addSql('ALTER TABLE User DROP phone_id');
    }
}
