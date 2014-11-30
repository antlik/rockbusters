<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141005151156 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE em_team_member ADD media_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE em_team_member ADD CONSTRAINT FK_B38DEB93EA9FDD75 FOREIGN KEY (media_id) REFERENCES media__media (id)');
        $this->addSql('CREATE INDEX IDX_B38DEB93EA9FDD75 ON em_team_member (media_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE em_team_member DROP FOREIGN KEY FK_B38DEB93EA9FDD75');
        $this->addSql('DROP INDEX IDX_B38DEB93EA9FDD75 ON em_team_member');
        $this->addSql('ALTER TABLE em_team_member DROP media_id');
    }
}
