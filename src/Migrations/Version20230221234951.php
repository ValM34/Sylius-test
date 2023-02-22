<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230221234951 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blog_comment (id INT AUTO_INCREMENT NOT NULL, id_customer INT NOT NULL, id_blog_post INT NOT NULL, status TINYINT(1) NOT NULL, updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7882EFEFD1E2629C (id_customer), INDEX IDX_7882EFEF3A6F5C3A (id_blog_post), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blog_post (id INT AUTO_INCREMENT NOT NULL, id_customer INT NOT NULL, title VARCHAR(150) NOT NULL, chapo VARCHAR(150) NOT NULL, content VARCHAR(15000) NOT NULL, img_src VARCHAR(200) NOT NULL, published TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_BA5AE01D2B36786B (title), INDEX IDX_BA5AE01DD1E2629C (id_customer), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE blog_comment ADD CONSTRAINT FK_7882EFEFD1E2629C FOREIGN KEY (id_customer) REFERENCES sylius_customer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE blog_comment ADD CONSTRAINT FK_7882EFEF3A6F5C3A FOREIGN KEY (id_blog_post) REFERENCES blog_post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE blog_post ADD CONSTRAINT FK_BA5AE01DD1E2629C FOREIGN KEY (id_customer) REFERENCES sylius_customer (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blog_comment DROP FOREIGN KEY FK_7882EFEF3A6F5C3A');
        $this->addSql('DROP TABLE blog_comment');
        $this->addSql('DROP TABLE blog_post');
    }
}
