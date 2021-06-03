<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210603125547 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE node DROP FOREIGN KEY FK_857FE845C036E511');
        $this->addSql('ALTER TABLE node DROP FOREIGN KEY FK_857FE845CCB0A29A');
        $this->addSql('DROP INDEX IDX_857FE845C036E511 ON node');
        $this->addSql('DROP INDEX IDX_857FE845CCB0A29A ON node');
        $this->addSql('ALTER TABLE node CHANGE lobby_id_id lobby_id INT NOT NULL, CHANGE player_id_id player_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE node ADD CONSTRAINT FK_857FE845B6612FD9 FOREIGN KEY (lobby_id) REFERENCES lobby (id)');
        $this->addSql('ALTER TABLE node ADD CONSTRAINT FK_857FE84599E6F5DF FOREIGN KEY (player_id) REFERENCES player (id)');
        $this->addSql('CREATE INDEX IDX_857FE845B6612FD9 ON node (lobby_id)');
        $this->addSql('CREATE INDEX IDX_857FE84599E6F5DF ON node (player_id)');
        $this->addSql('ALTER TABLE road DROP FOREIGN KEY FK_95C0C4B1C036E511');
        $this->addSql('DROP INDEX IDX_95C0C4B1C036E511 ON road');
        $this->addSql('ALTER TABLE road CHANGE player_id_id player_id INT NOT NULL');
        $this->addSql('ALTER TABLE road ADD CONSTRAINT FK_95C0C4B199E6F5DF FOREIGN KEY (player_id) REFERENCES player (id)');
        $this->addSql('CREATE INDEX IDX_95C0C4B199E6F5DF ON road (player_id)');
        $this->addSql('ALTER TABLE trade_offer DROP FOREIGN KEY FK_3DB57DDC036E511');
        $this->addSql('DROP INDEX UNIQ_3DB57DDC036E511 ON trade_offer');
        $this->addSql('ALTER TABLE trade_offer CHANGE player_id_id player_id INT NOT NULL');
        $this->addSql('ALTER TABLE trade_offer ADD CONSTRAINT FK_3DB57DD99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3DB57DD99E6F5DF ON trade_offer (player_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE node DROP FOREIGN KEY FK_857FE845B6612FD9');
        $this->addSql('ALTER TABLE node DROP FOREIGN KEY FK_857FE84599E6F5DF');
        $this->addSql('DROP INDEX IDX_857FE845B6612FD9 ON node');
        $this->addSql('DROP INDEX IDX_857FE84599E6F5DF ON node');
        $this->addSql('ALTER TABLE node CHANGE lobby_id lobby_id_id INT NOT NULL, CHANGE player_id player_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE node ADD CONSTRAINT FK_857FE845C036E511 FOREIGN KEY (player_id_id) REFERENCES player (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE node ADD CONSTRAINT FK_857FE845CCB0A29A FOREIGN KEY (lobby_id_id) REFERENCES lobby (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_857FE845C036E511 ON node (player_id_id)');
        $this->addSql('CREATE INDEX IDX_857FE845CCB0A29A ON node (lobby_id_id)');
        $this->addSql('ALTER TABLE road DROP FOREIGN KEY FK_95C0C4B199E6F5DF');
        $this->addSql('DROP INDEX IDX_95C0C4B199E6F5DF ON road');
        $this->addSql('ALTER TABLE road CHANGE player_id player_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE road ADD CONSTRAINT FK_95C0C4B1C036E511 FOREIGN KEY (player_id_id) REFERENCES player (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_95C0C4B1C036E511 ON road (player_id_id)');
        $this->addSql('ALTER TABLE trade_offer DROP FOREIGN KEY FK_3DB57DD99E6F5DF');
        $this->addSql('DROP INDEX UNIQ_3DB57DD99E6F5DF ON trade_offer');
        $this->addSql('ALTER TABLE trade_offer CHANGE player_id player_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE trade_offer ADD CONSTRAINT FK_3DB57DDC036E511 FOREIGN KEY (player_id_id) REFERENCES player (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3DB57DDC036E511 ON trade_offer (player_id_id)');
    }
}
