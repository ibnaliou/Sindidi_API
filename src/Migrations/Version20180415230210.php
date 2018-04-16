<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180415230210 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE localite (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, test VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, bien_id INT DEFAULT NULL, dateReservation DATETIME NOT NULL, etat INT NOT NULL, INDEX IDX_42C8495519EB6921 (client_id), INDEX IDX_42C84955BD95B80F (bien_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proprietaire_bien (id INT AUTO_INCREMENT NOT NULL, proprietaire_id INT DEFAULT NULL, bien_id INT DEFAULT NULL, adress VARCHAR(255) NOT NULL, prixLocation INT NOT NULL, INDEX IDX_C1AE295D76C50E4A (proprietaire_id), INDEX IDX_C1AE295DBD95B80F (bien_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, bien_id INT DEFAULT NULL, image LONGBLOB NOT NULL, INDEX IDX_C53D045FBD95B80F (bien_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, numpiece INT DEFAULT NULL, nomComplet VARCHAR(255) NOT NULL, tel VARCHAR(30) DEFAULT NULL, adress VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, motdepasse VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_C7440455289172D6 (numpiece), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contrat (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, bien_id INT DEFAULT NULL, dateContrat DATETIME NOT NULL, caution INT NOT NULL, duree VARCHAR(255) NOT NULL, INDEX IDX_6034999319EB6921 (client_id), INDEX IDX_60349993BD95B80F (bien_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proprietaire (id INT AUTO_INCREMENT NOT NULL, numpiece VARCHAR(50) DEFAULT NULL, nomComplet VARCHAR(50) NOT NULL, adresse VARCHAR(50) DEFAULT NULL, tel VARCHAR(20) NOT NULL, email VARCHAR(255) NOT NULL, codeBanque VARCHAR(255) NOT NULL, password VARCHAR(50) DEFAULT NULL, UNIQUE INDEX UNIQ_69E399D6E7927C74 (email), UNIQUE INDEX UNIQ_69E399D6D0373BDA (codeBanque), UNIQUE INDEX UNIQ_69E399D6289172D6 (numpiece), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bien (id INT AUTO_INCREMENT NOT NULL, proprietaire_id INT DEFAULT NULL, localite_id INT DEFAULT NULL, bien_id INT DEFAULT NULL, type_id INT DEFAULT NULL, nomBien VARCHAR(255) NOT NULL, etat INT NOT NULL, description TINYTEXT NOT NULL, prixLocation INT NOT NULL, INDEX IDX_45EDC38676C50E4A (proprietaire_id), INDEX IDX_45EDC386924DD2B5 (localite_id), INDEX IDX_45EDC386BD95B80F (bien_id), INDEX IDX_45EDC386C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_bien (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, niveau INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955BD95B80F FOREIGN KEY (bien_id) REFERENCES bien (id)');
        $this->addSql('ALTER TABLE proprietaire_bien ADD CONSTRAINT FK_C1AE295D76C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id)');
        $this->addSql('ALTER TABLE proprietaire_bien ADD CONSTRAINT FK_C1AE295DBD95B80F FOREIGN KEY (bien_id) REFERENCES bien (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FBD95B80F FOREIGN KEY (bien_id) REFERENCES bien (id)');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_6034999319EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993BD95B80F FOREIGN KEY (bien_id) REFERENCES bien (id)');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC38676C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id)');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC386924DD2B5 FOREIGN KEY (localite_id) REFERENCES localite (id)');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC386BD95B80F FOREIGN KEY (bien_id) REFERENCES bien (id)');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC386C54C8C93 FOREIGN KEY (type_id) REFERENCES type_bien (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC386924DD2B5');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495519EB6921');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_6034999319EB6921');
        $this->addSql('ALTER TABLE proprietaire_bien DROP FOREIGN KEY FK_C1AE295D76C50E4A');
        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC38676C50E4A');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955BD95B80F');
        $this->addSql('ALTER TABLE proprietaire_bien DROP FOREIGN KEY FK_C1AE295DBD95B80F');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FBD95B80F');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993BD95B80F');
        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC386BD95B80F');
        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC386C54C8C93');
        $this->addSql('DROP TABLE localite');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE proprietaire_bien');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE contrat');
        $this->addSql('DROP TABLE proprietaire');
        $this->addSql('DROP TABLE bien');
        $this->addSql('DROP TABLE type_bien');
    }
}
