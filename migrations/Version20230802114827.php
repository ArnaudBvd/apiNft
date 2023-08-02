<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230802114827 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE nft (id INT AUTO_INCREMENT NOT NULL, nftcollection_id INT NOT NULL, owner_id INT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, price NUMERIC(6, 2) NOT NULL, onsale TINYINT(1) NOT NULL, INDEX IDX_D9C7463C38428D49 (nftcollection_id), INDEX IDX_D9C7463C7E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nft_collection (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, buyer_id INT NOT NULL, seller_id INT NOT NULL, nft_id INT NOT NULL, date DATETIME NOT NULL, amount NUMERIC(6, 2) NOT NULL, INDEX IDX_723705D16C755722 (buyer_id), INDEX IDX_723705D18DE820D9 (seller_id), INDEX IDX_723705D1E813668D (nft_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463C38428D49 FOREIGN KEY (nftcollection_id) REFERENCES nft_collection (id)');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463C7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D16C755722 FOREIGN KEY (buyer_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D18DE820D9 FOREIGN KEY (seller_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1E813668D FOREIGN KEY (nft_id) REFERENCES nft (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463C38428D49');
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463C7E3C61F9');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D16C755722');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D18DE820D9');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1E813668D');
        $this->addSql('DROP TABLE nft');
        $this->addSql('DROP TABLE nft_collection');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('DROP TABLE user');
    }
}
