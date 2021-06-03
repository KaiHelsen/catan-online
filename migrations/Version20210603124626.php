<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210603124626 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE card (id INT AUTO_INCREMENT NOT NULL, held_by_id INT DEFAULT NULL, lobby_id INT NOT NULL, type INT NOT NULL, description VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, functionality INT NOT NULL, INDEX IDX_161498D35EEE5820 (held_by_id), INDEX IDX_161498D3B6612FD9 (lobby_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lobby (id INT AUTO_INCREMENT NOT NULL, has_biggest_army_id INT DEFAULT NULL, has_longest_road_id INT DEFAULT NULL, active_player_id INT NOT NULL, UNIQUE INDEX UNIQ_CCE455F7BE520B55 (has_biggest_army_id), UNIQUE INDEX UNIQ_CCE455F7A28BA72B (has_longest_road_id), UNIQUE INDEX UNIQ_CCE455F78F70B6EB (active_player_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE node (id INT AUTO_INCREMENT NOT NULL, lobby_id_id INT NOT NULL, player_id_id INT DEFAULT NULL, is_placed TINYINT(1) NOT NULL, is_city TINYINT(1) DEFAULT NULL, INDEX IDX_857FE845CCB0A29A (lobby_id_id), INDEX IDX_857FE845C036E511 (player_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player (id INT AUTO_INCREMENT NOT NULL, lobby_id INT DEFAULT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, victory_points INT NOT NULL, colour VARCHAR(255) NOT NULL, knights_played INT NOT NULL, brick INT NOT NULL, ore INT NOT NULL, lumber INT NOT NULL, grain INT NOT NULL, wool INT NOT NULL, UNIQUE INDEX UNIQ_98197A65F85E0677 (username), INDEX IDX_98197A65B6612FD9 (lobby_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE road (id INT AUTO_INCREMENT NOT NULL, player_id_id INT NOT NULL, position1_id INT NOT NULL, position2_id INT NOT NULL, is_placed TINYINT(1) NOT NULL, INDEX IDX_95C0C4B1C036E511 (player_id_id), INDEX IDX_95C0C4B1490E4D18 (position1_id), INDEX IDX_95C0C4B15BBBE2F6 (position2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tile (id INT AUTO_INCREMENT NOT NULL, lobby_id INT NOT NULL, value INT NOT NULL, type VARCHAR(255) NOT NULL, has_robber TINYINT(1) NOT NULL, INDEX IDX_768FA904B6612FD9 (lobby_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trade_offer (id INT AUTO_INCREMENT NOT NULL, player_id_id INT NOT NULL, proposal JSON NOT NULL, UNIQUE INDEX UNIQ_3DB57DDC036E511 (player_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE card ADD CONSTRAINT FK_161498D35EEE5820 FOREIGN KEY (held_by_id) REFERENCES player (id)');
        $this->addSql('ALTER TABLE card ADD CONSTRAINT FK_161498D3B6612FD9 FOREIGN KEY (lobby_id) REFERENCES lobby (id)');
        $this->addSql('ALTER TABLE lobby ADD CONSTRAINT FK_CCE455F7BE520B55 FOREIGN KEY (has_biggest_army_id) REFERENCES player (id)');
        $this->addSql('ALTER TABLE lobby ADD CONSTRAINT FK_CCE455F7A28BA72B FOREIGN KEY (has_longest_road_id) REFERENCES player (id)');
        $this->addSql('ALTER TABLE lobby ADD CONSTRAINT FK_CCE455F78F70B6EB FOREIGN KEY (active_player_id) REFERENCES player (id)');
        $this->addSql('ALTER TABLE node ADD CONSTRAINT FK_857FE845CCB0A29A FOREIGN KEY (lobby_id_id) REFERENCES lobby (id)');
        $this->addSql('ALTER TABLE node ADD CONSTRAINT FK_857FE845C036E511 FOREIGN KEY (player_id_id) REFERENCES player (id)');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A65B6612FD9 FOREIGN KEY (lobby_id) REFERENCES lobby (id)');
        $this->addSql('ALTER TABLE road ADD CONSTRAINT FK_95C0C4B1C036E511 FOREIGN KEY (player_id_id) REFERENCES player (id)');
        $this->addSql('ALTER TABLE road ADD CONSTRAINT FK_95C0C4B1490E4D18 FOREIGN KEY (position1_id) REFERENCES node (id)');
        $this->addSql('ALTER TABLE road ADD CONSTRAINT FK_95C0C4B15BBBE2F6 FOREIGN KEY (position2_id) REFERENCES node (id)');
        $this->addSql('ALTER TABLE tile ADD CONSTRAINT FK_768FA904B6612FD9 FOREIGN KEY (lobby_id) REFERENCES lobby (id)');
        $this->addSql('ALTER TABLE trade_offer ADD CONSTRAINT FK_3DB57DDC036E511 FOREIGN KEY (player_id_id) REFERENCES player (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE card DROP FOREIGN KEY FK_161498D3B6612FD9');
        $this->addSql('ALTER TABLE node DROP FOREIGN KEY FK_857FE845CCB0A29A');
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A65B6612FD9');
        $this->addSql('ALTER TABLE tile DROP FOREIGN KEY FK_768FA904B6612FD9');
        $this->addSql('ALTER TABLE road DROP FOREIGN KEY FK_95C0C4B1490E4D18');
        $this->addSql('ALTER TABLE road DROP FOREIGN KEY FK_95C0C4B15BBBE2F6');
        $this->addSql('ALTER TABLE card DROP FOREIGN KEY FK_161498D35EEE5820');
        $this->addSql('ALTER TABLE lobby DROP FOREIGN KEY FK_CCE455F7BE520B55');
        $this->addSql('ALTER TABLE lobby DROP FOREIGN KEY FK_CCE455F7A28BA72B');
        $this->addSql('ALTER TABLE lobby DROP FOREIGN KEY FK_CCE455F78F70B6EB');
        $this->addSql('ALTER TABLE node DROP FOREIGN KEY FK_857FE845C036E511');
        $this->addSql('ALTER TABLE road DROP FOREIGN KEY FK_95C0C4B1C036E511');
        $this->addSql('ALTER TABLE trade_offer DROP FOREIGN KEY FK_3DB57DDC036E511');
        $this->addSql('DROP TABLE card');
        $this->addSql('DROP TABLE lobby');
        $this->addSql('DROP TABLE node');
        $this->addSql('DROP TABLE player');
        $this->addSql('DROP TABLE road');
        $this->addSql('DROP TABLE tile');
        $this->addSql('DROP TABLE trade_offer');
    }
}
