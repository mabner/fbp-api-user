<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210428061345 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_contact_phone ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE user_contact_phone ADD CONSTRAINT FK_87EB2A82A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_87EB2A82A76ED395 ON user_contact_phone (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_contact_phone DROP FOREIGN KEY FK_87EB2A82A76ED395');
        $this->addSql('DROP INDEX IDX_87EB2A82A76ED395 ON user_contact_phone');
        $this->addSql('ALTER TABLE user_contact_phone DROP user_id');
    }
}
