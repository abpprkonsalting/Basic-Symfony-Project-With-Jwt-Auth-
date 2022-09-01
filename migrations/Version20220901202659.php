<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220901202659 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product_offer_bid (id INT AUTO_INCREMENT NOT NULL, product_offer_id INT NOT NULL, user_id INT NOT NULL, price INT NOT NULL, date DATETIME NOT NULL, eta DATETIME DEFAULT NULL, INDEX IDX_86764E698761E79 (product_offer_id), INDEX IDX_86764E6A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_offer_bid ADD CONSTRAINT FK_86764E698761E79 FOREIGN KEY (product_offer_id) REFERENCES product_offer (id)');
        $this->addSql('ALTER TABLE product_offer_bid ADD CONSTRAINT FK_86764E6A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE product_offer_bid');
    }
}
