<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211116132327 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projet ADD type_projet_id INT NOT NULL, ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9B407C362 FOREIGN KEY (type_projet_id) REFERENCES type_projet (id)');
        $this->addSql('CREATE INDEX IDX_50159CA9B407C362 ON projet (type_projet_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9B407C362');
        $this->addSql('DROP INDEX IDX_50159CA9B407C362 ON projet');
        $this->addSql('ALTER TABLE projet DROP type_projet_id, DROP slug');
    }
}
