<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190206180213 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cotations (id INT AUTO_INCREMENT NOT NULL, id_cryptos_id INT NOT NULL, valeur DOUBLE PRECISION NOT NULL, date DATETIME DEFAULT NULL, cours_actuel INT NOT NULL, evolution DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_6A26272B96A95A0A (id_cryptos_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cryptos (id INT AUTO_INCREMENT NOT NULL, wallets_id INT NOT NULL, nom VARCHAR(255) NOT NULL, image VARCHAR(50) NOT NULL, sigle VARCHAR(5) DEFAULT NULL, INDEX IDX_86B4908CC3B43BA3 (wallets_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transactions (id INT AUTO_INCREMENT NOT NULL, id_users_id INT NOT NULL, id_crytos_id INT NOT NULL, date DATETIME DEFAULT NULL, montant DOUBLE PRECISION NOT NULL, montant_crypto DOUBLE PRECISION NOT NULL, type_transaction VARCHAR(10) NOT NULL, etat TINYINT(1) DEFAULT NULL, INDEX IDX_EAA81A4C376858A8 (id_users_id), INDEX IDX_EAA81A4CFF0CAAE6 (id_crytos_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(20) NOT NULL, salt VARCHAR(255) NOT NULL, email VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, nom VARCHAR(50) NOT NULL, ville VARCHAR(50) NOT NULL, adresse VARCHAR(255) NOT NULL, cp INT NOT NULL, telephone INT NOT NULL, solde DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wallets (id INT AUTO_INCREMENT NOT NULL, id_users_id INT NOT NULL, montants DOUBLE PRECISION NOT NULL, montant_euro DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_967AAA6C376858A8 (id_users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cotations ADD CONSTRAINT FK_6A26272B96A95A0A FOREIGN KEY (id_cryptos_id) REFERENCES cryptos (id)');
        $this->addSql('ALTER TABLE cryptos ADD CONSTRAINT FK_86B4908CC3B43BA3 FOREIGN KEY (wallets_id) REFERENCES wallets (id)');
        $this->addSql('ALTER TABLE transactions ADD CONSTRAINT FK_EAA81A4C376858A8 FOREIGN KEY (id_users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE transactions ADD CONSTRAINT FK_EAA81A4CFF0CAAE6 FOREIGN KEY (id_crytos_id) REFERENCES cryptos (id)');
        $this->addSql('ALTER TABLE wallets ADD CONSTRAINT FK_967AAA6C376858A8 FOREIGN KEY (id_users_id) REFERENCES users (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cotations DROP FOREIGN KEY FK_6A26272B96A95A0A');
        $this->addSql('ALTER TABLE transactions DROP FOREIGN KEY FK_EAA81A4CFF0CAAE6');
        $this->addSql('ALTER TABLE transactions DROP FOREIGN KEY FK_EAA81A4C376858A8');
        $this->addSql('ALTER TABLE wallets DROP FOREIGN KEY FK_967AAA6C376858A8');
        $this->addSql('ALTER TABLE cryptos DROP FOREIGN KEY FK_86B4908CC3B43BA3');
        $this->addSql('DROP TABLE cotations');
        $this->addSql('DROP TABLE cryptos');
        $this->addSql('DROP TABLE transactions');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE wallets');
    }
}
