<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220901193122 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product_attribute_value_string (entity_id INT NOT NULL, attribute_id INT NOT NULL, location_id INT NOT NULL, value VARCHAR(255) NOT NULL, INDEX IDX_F6D5D4AD81257D5D (entity_id), INDEX IDX_F6D5D4ADB6E62EFA (attribute_id), INDEX IDX_F6D5D4AD64D218E (location_id), PRIMARY KEY(entity_id, attribute_id, location_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_attribute_value_string ADD CONSTRAINT FK_F6D5D4AD81257D5D FOREIGN KEY (entity_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_attribute_value_string ADD CONSTRAINT FK_F6D5D4ADB6E62EFA FOREIGN KEY (attribute_id) REFERENCES attribute (id)');
        $this->addSql('ALTER TABLE product_attribute_value_string ADD CONSTRAINT FK_F6D5D4AD64D218E FOREIGN KEY (location_id) REFERENCES location (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE product_attribute_value_string');
    }
}
