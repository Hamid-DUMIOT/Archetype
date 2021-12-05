<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211118215432 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offre ADD typeoffre_id INT NOT NULL, ADD slug VARCHAR(255) NOT NULL, ADD lieu VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866F10A1DED2 FOREIGN KEY (typeoffre_id) REFERENCES type_offre (id)');
        $this->addSql('CREATE INDEX IDX_AF86866F10A1DED2 ON offre (typeoffre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866F10A1DED2');
        $this->addSql('DROP INDEX IDX_AF86866F10A1DED2 ON offre');
        $this->addSql('ALTER TABLE offre DROP typeoffre_id, DROP slug, DROP lieu');
    }
}
