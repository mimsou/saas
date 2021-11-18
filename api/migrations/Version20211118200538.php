<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211118200538 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE greeting_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE hello_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE hellow_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE acompte_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE article_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE article_famille_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE bon_de_livraison_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE bon_details_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE client_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE devis_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE devis_details_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE facture_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE facture_details_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE mode_de_paiments_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE reglement_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE acompte (id INT NOT NULL, id_facture_id INT NOT NULL, date_acompte TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, mantant DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_CE996BECDAA76EDF ON acompte (id_facture_id)');
        $this->addSql('CREATE TABLE article (id INT NOT NULL, famille_id INT NOT NULL, designation VARCHAR(150) NOT NULL, etat INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_23A0E6697A77B84 ON article (famille_id)');
        $this->addSql('CREATE TABLE article_famille (id INT NOT NULL, libelle VARCHAR(150) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE bon_de_livraison (id INT NOT NULL, id_facture_id INT NOT NULL, date_livraison TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2F9D665BDAA76EDF ON bon_de_livraison (id_facture_id)');
        $this->addSql('CREATE TABLE bon_details (id INT NOT NULL, id_bon_de_livraison_id INT NOT NULL, id_detail_devis_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B43EAE40FD5BBB5D ON bon_details (id_bon_de_livraison_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B43EAE405E5ED089 ON bon_details (id_detail_devis_id)');
        $this->addSql('CREATE TABLE client (id INT NOT NULL, nom_client VARCHAR(200) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE devis (id INT NOT NULL, id_client_id INT NOT NULL, date_envoie TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, date_validation TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, mantant_devis DOUBLE PRECISION NOT NULL, etat INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8B27C52B99DED506 ON devis (id_client_id)');
        $this->addSql('CREATE TABLE devis_details (id INT NOT NULL, id_devis_id INT NOT NULL, article_id INT NOT NULL, quatite DOUBLE PRECISION NOT NULL, prix_ht DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E0C890D61105164F ON devis_details (id_devis_id)');
        $this->addSql('CREATE INDEX IDX_E0C890D67294869C ON devis_details (article_id)');
        $this->addSql('CREATE TABLE facture (id INT NOT NULL, id_client_id INT NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FE86641099DED506 ON facture (id_client_id)');
        $this->addSql('CREATE TABLE facture_details (id INT NOT NULL, id_facture_id INT NOT NULL, quatite DOUBLE PRECISION NOT NULL, prix_ht DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3AC1AAD3DAA76EDF ON facture_details (id_facture_id)');
        $this->addSql('CREATE TABLE mode_de_paiments (id INT NOT NULL, libelle VARCHAR(150) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE reglement (id INT NOT NULL, id_facture_id INT NOT NULL, id_mode_paiement_id INT NOT NULL, montant DOUBLE PRECISION NOT NULL, numero_cheque VARCHAR(150) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_EBE4C14CDAA76EDF ON reglement (id_facture_id)');
        $this->addSql('CREATE INDEX IDX_EBE4C14CA0050EB2 ON reglement (id_mode_paiement_id)');
        $this->addSql('ALTER TABLE acompte ADD CONSTRAINT FK_CE996BECDAA76EDF FOREIGN KEY (id_facture_id) REFERENCES facture (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6697A77B84 FOREIGN KEY (famille_id) REFERENCES article_famille (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bon_de_livraison ADD CONSTRAINT FK_2F9D665BDAA76EDF FOREIGN KEY (id_facture_id) REFERENCES facture (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bon_details ADD CONSTRAINT FK_B43EAE40FD5BBB5D FOREIGN KEY (id_bon_de_livraison_id) REFERENCES bon_de_livraison (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bon_details ADD CONSTRAINT FK_B43EAE405E5ED089 FOREIGN KEY (id_detail_devis_id) REFERENCES devis_details (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52B99DED506 FOREIGN KEY (id_client_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE devis_details ADD CONSTRAINT FK_E0C890D61105164F FOREIGN KEY (id_devis_id) REFERENCES devis (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE devis_details ADD CONSTRAINT FK_E0C890D67294869C FOREIGN KEY (article_id) REFERENCES article (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE86641099DED506 FOREIGN KEY (id_client_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE facture_details ADD CONSTRAINT FK_3AC1AAD3DAA76EDF FOREIGN KEY (id_facture_id) REFERENCES facture (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reglement ADD CONSTRAINT FK_EBE4C14CDAA76EDF FOREIGN KEY (id_facture_id) REFERENCES facture (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reglement ADD CONSTRAINT FK_EBE4C14CA0050EB2 FOREIGN KEY (id_mode_paiement_id) REFERENCES mode_de_paiments (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE greeting');
        $this->addSql('DROP TABLE hello');
        $this->addSql('DROP TABLE hellow');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE devis_details DROP CONSTRAINT FK_E0C890D67294869C');
        $this->addSql('ALTER TABLE article DROP CONSTRAINT FK_23A0E6697A77B84');
        $this->addSql('ALTER TABLE bon_details DROP CONSTRAINT FK_B43EAE40FD5BBB5D');
        $this->addSql('ALTER TABLE devis DROP CONSTRAINT FK_8B27C52B99DED506');
        $this->addSql('ALTER TABLE facture DROP CONSTRAINT FK_FE86641099DED506');
        $this->addSql('ALTER TABLE devis_details DROP CONSTRAINT FK_E0C890D61105164F');
        $this->addSql('ALTER TABLE bon_details DROP CONSTRAINT FK_B43EAE405E5ED089');
        $this->addSql('ALTER TABLE acompte DROP CONSTRAINT FK_CE996BECDAA76EDF');
        $this->addSql('ALTER TABLE bon_de_livraison DROP CONSTRAINT FK_2F9D665BDAA76EDF');
        $this->addSql('ALTER TABLE facture_details DROP CONSTRAINT FK_3AC1AAD3DAA76EDF');
        $this->addSql('ALTER TABLE reglement DROP CONSTRAINT FK_EBE4C14CDAA76EDF');
        $this->addSql('ALTER TABLE reglement DROP CONSTRAINT FK_EBE4C14CA0050EB2');
        $this->addSql('DROP SEQUENCE acompte_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE article_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE article_famille_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE bon_de_livraison_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE bon_details_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE client_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE devis_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE devis_details_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE facture_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE facture_details_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE mode_de_paiments_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE reglement_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE greeting_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE hello_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE hellow_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE greeting (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE hello (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE hellow (id INT NOT NULL, name VARCHAR(200) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE acompte');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_famille');
        $this->addSql('DROP TABLE bon_de_livraison');
        $this->addSql('DROP TABLE bon_details');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE devis');
        $this->addSql('DROP TABLE devis_details');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE facture_details');
        $this->addSql('DROP TABLE mode_de_paiments');
        $this->addSql('DROP TABLE reglement');
    }
}
