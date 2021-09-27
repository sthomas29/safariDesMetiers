<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210906102643 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animal (id INT AUTO_INCREMENT NOT NULL, famille_id INT NOT NULL, regime_alimentaire_id INT NOT NULL, nom VARCHAR(255) NOT NULL, nom_scientifique VARCHAR(255) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, lieu_de_vie VARCHAR(255) DEFAULT NULL, INDEX IDX_6AAB231F97A77B84 (famille_id), INDEX IDX_6AAB231F7B2EE792 (regime_alimentaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE animal_animal (animal_source INT NOT NULL, animal_target INT NOT NULL, INDEX IDX_D05AE6C3E57BBAAF (animal_source), INDEX IDX_D05AE6C3FC9EEA20 (animal_target), PRIMARY KEY(animal_source, animal_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE famille (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE regime_alimentaire (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F97A77B84 FOREIGN KEY (famille_id) REFERENCES famille (id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F7B2EE792 FOREIGN KEY (regime_alimentaire_id) REFERENCES regime_alimentaire (id)');
        $this->addSql('ALTER TABLE animal_animal ADD CONSTRAINT FK_D05AE6C3E57BBAAF FOREIGN KEY (animal_source) REFERENCES animal (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animal_animal ADD CONSTRAINT FK_D05AE6C3FC9EEA20 FOREIGN KEY (animal_target) REFERENCES animal (id) ON DELETE CASCADE');

        $this->addSql('ALTER TABLE animal ADD description LONGTEXT DEFAULT NULL, ADD lien_wiki VARCHAR(255) DEFAULT NULL');

        $this->addSql('ALTER TABLE user AUTO_INCREMENT = 1');
        $this->addSql('ALTER TABLE animal AUTO_INCREMENT = 1');
        $this->addSql('ALTER TABLE famille AUTO_INCREMENT = 1');
        $this->addSql('ALTER TABLE regime_alimentaire AUTO_INCREMENT = 1');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal_animal DROP FOREIGN KEY FK_D05AE6C3E57BBAAF');
        $this->addSql('ALTER TABLE animal_animal DROP FOREIGN KEY FK_D05AE6C3FC9EEA20');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F97A77B84');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F7B2EE792');
        $this->addSql('DROP TABLE animal');
        $this->addSql('DROP TABLE animal_animal');
        $this->addSql('DROP TABLE famille');
        $this->addSql('DROP TABLE regime_alimentaire');
        $this->addSql('DROP TABLE `user`');
    }
}
