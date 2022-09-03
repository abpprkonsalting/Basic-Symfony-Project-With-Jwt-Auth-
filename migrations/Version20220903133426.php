<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220903133426 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_interchange_location_value_int (id INT AUTO_INCREMENT NOT NULL, entity_id INT NOT NULL, attribute_id INT NOT NULL, value INT NOT NULL, INDEX IDX_F248ABF681257D5D (entity_id), INDEX IDX_F248ABF6B6E62EFA (attribute_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_interchange_location_value_string (id INT AUTO_INCREMENT NOT NULL, entity_id INT NOT NULL, attribute_id INT NOT NULL, value VARCHAR(255) NOT NULL, INDEX IDX_B924C97D81257D5D (entity_id), INDEX IDX_B924C97DB6E62EFA (attribute_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_interchange_location_value_int ADD CONSTRAINT FK_F248ABF681257D5D FOREIGN KEY (entity_id) REFERENCES user_interchange_location (id)');
        $this->addSql('ALTER TABLE user_interchange_location_value_int ADD CONSTRAINT FK_F248ABF6B6E62EFA FOREIGN KEY (attribute_id) REFERENCES attribute (id)');
        $this->addSql('ALTER TABLE user_interchange_location_value_string ADD CONSTRAINT FK_B924C97D81257D5D FOREIGN KEY (entity_id) REFERENCES user_interchange_location (id)');
        $this->addSql('ALTER TABLE user_interchange_location_value_string ADD CONSTRAINT FK_B924C97DB6E62EFA FOREIGN KEY (attribute_id) REFERENCES attribute (id)');
        $this->addSql('ALTER TABLE user_interchange_location DROP lateral_street1, DROP lateral_street2');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_interchange_location_value_int');
        $this->addSql('DROP TABLE user_interchange_location_value_string');
        $this->addSql('ALTER TABLE user_interchange_location ADD lateral_street1 VARCHAR(255) NOT NULL, ADD lateral_street2 VARCHAR(255) NOT NULL');
    }
}
