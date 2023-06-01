<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230527073934 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE data_challenge (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, description VARCHAR(4000), image VARCHAR(255), type VARCHAR(10),PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE data_project (id INT AUTO_INCREMENT NOT NULL, id_challenge_id INT NOT NULL, name VARCHAR(100) NOT NULL, description VARCHAR(510) NOT NULL, image VARCHAR(50) NOT NULL, contact VARCHAR(510) NOT NULL, INDEX IDX_4BB8861FBB636FB4 (id_challenge_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quiz (id INT AUTO_INCREMENT NOT NULL, id_project_id INT NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, question1 VARCHAR(1000) NOT NULL, question2 VARCHAR(1000) NOT NULL , question3 VARCHAR(1000) NOT NULL , question4 VARCHAR(1000) NOT NULL , question5 VARCHAR(1000), INDEX IDX_A412FA92B3E79F4B (id_project_id),  PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');        
        $this ->addSql('CREATE TABLE quiz_answer (id INT AUTO_INCREMENT NOT NULL, id_quizz_id INT NOT NULL, id_team_id INT NOT NULL,result VARCHAR(255), answer1 TEXT(65535) NOT NULL, answer2 TEXT(65535) NOT NULL, answer3 TEXT(65535) NOT NULL, answer4 TEXT(65535) NOT NULL, answer5 TEXT(65535) NOT NULL, INDEX IDX_3799BA7CEA48A758 (id_quizz_id), INDEX IDX_3799BA7CF7F171DE (id_team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resources (id INT AUTO_INCREMENT NOT NULL, id_project_id INT NOT NULL, url VARCHAR(255) NOT NULL, INDEX IDX_EF66EBAEB3E79F4B (id_project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, id_project_id INT NOT NULL, name VARCHAR(255) NOT NULL, id_leader_id INT NOT NULL, INDEX IDX_C4E0A61FB3E79F4B (id_project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team_users (team_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_D385ECA9296CD8AE (team_id), INDEX IDX_D385ECA967B3B43D (users_id), PRIMARY KEY(team_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL,city VARCHAR(50), study_level VARCHAR(10),school_company VARCHAR(255), creation_date DATETIME NOT NULL, deletion_date DATETIME ,email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, lastname VARCHAR(100) NOT NULL, firstname VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resources_challenge (id INT AUTO_INCREMENT NOT NULL,name VARCHAR(255), id_challenge_id INT NOT NULL, url VARCHAR(255) NOT NULL, INDEX IDX_EF66EBAEB3E79F4B (id_challenge_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gestion (id INT AUTO_INCREMENT NOT NULL, id_challenge_id INT NOT NULL, id_users_id INT NOT NULL, INDEX IDX_4BB8861FBB636FB4 (id_challenge_id), INDEX IDX_4BB8861FBB636FB5 (id_users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE code_eval(id INT AUTO_INCREMENT NOT NULL, code MEDIUMTEXT NOT NULL,result MEDIUMTEXT, id_team_id INT NOT NULL, INDEX IDX_4BB8861FBB636FM5 (id_team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE code_eval ADD CONSTRAINT FK_4BB8861FBB636FM5 FOREIGN KEY (id_team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gestion ADD CONSTRAINT FK_4BB8861FBB636FC4 FOREIGN KEY (id_challenge_id) REFERENCES data_challenge (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gestion ADD CONSTRAINT FK_4BB8861FBB636FC5 FOREIGN KEY (id_users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE resources_challenge ADD CONSTRAINT FK_EF66EBAEB3E79F7B FOREIGN KEY (id_challenge_id) REFERENCES data_challenge (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE data_project ADD CONSTRAINT FK_4BB8861FBB636FB4 FOREIGN KEY (id_challenge_id) REFERENCES data_challenge (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quiz ADD CONSTRAINT FK_A412FA92B3E79F4B FOREIGN KEY (id_project_id) REFERENCES data_project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quiz_answer ADD CONSTRAINT FK_3799BA7CEA48A758 FOREIGN KEY (id_quizz_id) REFERENCES quiz (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quiz_answer ADD CONSTRAINT FK_3799BA7CF7F171DE FOREIGN KEY (id_team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE resources ADD CONSTRAINT FK_EF66EBAEB3E79F4B FOREIGN KEY (id_project_id) REFERENCES data_project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61FB3E79F4B FOREIGN KEY (id_project_id) REFERENCES data_project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61FB3E79F4C FOREIGN KEY (id_leader_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_users ADD CONSTRAINT FK_D385ECA9296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_users ADD CONSTRAINT FK_D385ECA967B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE data_project DROP FOREIGN KEY FK_4BB8861FBB636FB4');
        $this->addSql('ALTER TABLE quiz DROP FOREIGN KEY FK_A412FA92B3E79F4B');
        $this->addSql('ALTER TABLE quiz_answer DROP FOREIGN KEY FK_3799BA7CEA48A758');
        $this->addSql('ALTER TABLE quiz_answer DROP FOREIGN KEY FK_3799BA7CF7F171DE');
        $this->addSql('ALTER TABLE resources DROP FOREIGN KEY FK_EF66EBAEB3E79F4B');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61FB3E79F4B');
        $this->addSql('ALTER TABLE team_users DROP FOREIGN KEY FK_D385ECA9296CD8AE');
        $this->addSql('ALTER TABLE team_users DROP FOREIGN KEY FK_D385ECA967B3B43D');
        $this->addSql('DROP TABLE data_challenge');
        $this->addSql('DROP TABLE data_project');
        $this->addSql('DROP TABLE quiz');
        $this->addSql('DROP TABLE quiz_answer');
        $this->addSql('DROP TABLE resources');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE team_users');
        $this->addSql('DROP TABLE users');
    }
}
