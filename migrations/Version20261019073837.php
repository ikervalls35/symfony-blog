<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261019073837 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE user DROP id, CHANGE password name VARCHAR(255) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (name)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user MODIFY name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD id INT AUTO_INCREMENT NOT NULL, CHANGE name password VARCHAR(255) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }
}
