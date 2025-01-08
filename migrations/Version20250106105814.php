<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250106105814 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `character` (id INT AUTO_INCREMENT NOT NULL, planet_id INT NOT NULL, name VARCHAR(255) NOT NULL, species VARCHAR(255) NOT NULL, height VARCHAR(255) NOT NULL, mass VARCHAR(255) NOT NULL, birth_year VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_937AB034A25E9820 (planet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_starships (character_id INT NOT NULL, starships_id INT NOT NULL, INDEX IDX_A93D1581136BE75 (character_id), INDEX IDX_A93D1582AAF09FB (starships_id), PRIMARY KEY(character_id, starships_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, episode_id INT NOT NULL, opening_crawl LONGTEXT NOT NULL, director VARCHAR(255) NOT NULL, producer VARCHAR(255) NOT NULL, release_date VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film_starships (film_id INT NOT NULL, starships_id INT NOT NULL, INDEX IDX_B90F2D50567F5183 (film_id), INDEX IDX_B90F2D502AAF09FB (starships_id), PRIMARY KEY(film_id, starships_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film_character (film_id INT NOT NULL, character_id INT NOT NULL, INDEX IDX_A7B6EE07567F5183 (film_id), INDEX IDX_A7B6EE071136BE75 (character_id), PRIMARY KEY(film_id, character_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film_planet (film_id INT NOT NULL, planet_id INT NOT NULL, INDEX IDX_3E157AF567F5183 (film_id), INDEX IDX_3E157AFA25E9820 (planet_id), PRIMARY KEY(film_id, planet_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planet (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, population VARCHAR(255) NOT NULL, climate VARCHAR(255) DEFAULT NULL, orbital_period VARCHAR(255) DEFAULT NULL, rotation_period VARCHAR(255) DEFAULT NULL, terrain VARCHAR(255) DEFAULT NULL, gravity VARCHAR(255) DEFAULT NULL, diameter VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE starships (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, cost_in_credits VARCHAR(255) NOT NULL, max_atmosphering_speed VARCHAR(255) NOT NULL, passengers VARCHAR(255) NOT NULL, cargo_capacity VARCHAR(255) NOT NULL, manufacturer VARCHAR(255) NOT NULL, length VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034A25E9820 FOREIGN KEY (planet_id) REFERENCES planet (id)');
        $this->addSql('ALTER TABLE character_starships ADD CONSTRAINT FK_A93D1581136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_starships ADD CONSTRAINT FK_A93D1582AAF09FB FOREIGN KEY (starships_id) REFERENCES starships (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film_starships ADD CONSTRAINT FK_B90F2D50567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film_starships ADD CONSTRAINT FK_B90F2D502AAF09FB FOREIGN KEY (starships_id) REFERENCES starships (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film_character ADD CONSTRAINT FK_A7B6EE07567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film_character ADD CONSTRAINT FK_A7B6EE071136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film_planet ADD CONSTRAINT FK_3E157AF567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film_planet ADD CONSTRAINT FK_3E157AFA25E9820 FOREIGN KEY (planet_id) REFERENCES planet (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034A25E9820');
        $this->addSql('ALTER TABLE character_starships DROP FOREIGN KEY FK_A93D1581136BE75');
        $this->addSql('ALTER TABLE character_starships DROP FOREIGN KEY FK_A93D1582AAF09FB');
        $this->addSql('ALTER TABLE film_starships DROP FOREIGN KEY FK_B90F2D50567F5183');
        $this->addSql('ALTER TABLE film_starships DROP FOREIGN KEY FK_B90F2D502AAF09FB');
        $this->addSql('ALTER TABLE film_character DROP FOREIGN KEY FK_A7B6EE07567F5183');
        $this->addSql('ALTER TABLE film_character DROP FOREIGN KEY FK_A7B6EE071136BE75');
        $this->addSql('ALTER TABLE film_planet DROP FOREIGN KEY FK_3E157AF567F5183');
        $this->addSql('ALTER TABLE film_planet DROP FOREIGN KEY FK_3E157AFA25E9820');
        $this->addSql('DROP TABLE `character`');
        $this->addSql('DROP TABLE character_starships');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE film_starships');
        $this->addSql('DROP TABLE film_character');
        $this->addSql('DROP TABLE film_planet');
        $this->addSql('DROP TABLE planet');
        $this->addSql('DROP TABLE starships');
    }
}
