<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140820144418 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE em_location DROP FOREIGN KEY FK_F84ADC53EA9FDD75');
        $this->addSql('DROP INDEX IDX_F84ADC53EA9FDD75 ON em_location');
        $this->addSql('ALTER TABLE em_location DROP media_id');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE em_location ADD media_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE em_location ADD CONSTRAINT FK_F84ADC53EA9FDD75 FOREIGN KEY (media_id) REFERENCES media__media (id)');
        $this->addSql('CREATE INDEX IDX_F84ADC53EA9FDD75 ON em_location (media_id)');
    }
}
