<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191113214210 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, description VARCHAR(255) NOT NULL, type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_project_people (project_id INT NOT NULL, project_people_id INT NOT NULL, INDEX IDX_D605B5CE166D1F9C (project_id), INDEX IDX_D605B5CE207B8CE1 (project_people_id), PRIMARY KEY(project_id, project_people_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_department (project_id INT NOT NULL, department_id INT NOT NULL, INDEX IDX_D5BB9AB8166D1F9C (project_id), INDEX IDX_D5BB9AB8AE80F5DF (department_id), PRIMARY KEY(project_id, department_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE staff (id INT AUTO_INCREMENT NOT NULL, company_id INT DEFAULT NULL, full_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone INT NOT NULL, created_at VARCHAR(255) DEFAULT NULL, skills VARCHAR(255) DEFAULT NULL, comments VARCHAR(255) DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, INDEX IDX_426EF392979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE staff_department (staff_id INT NOT NULL, department_id INT NOT NULL, INDEX IDX_2B4FF15BD4D57CD (staff_id), INDEX IDX_2B4FF15BAE80F5DF (department_id), PRIMARY KEY(staff_id, department_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE department (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, team_lead VARCHAR(255) NOT NULL, full_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE department_project (department_id INT NOT NULL, project_id INT NOT NULL, INDEX IDX_921A380DAE80F5DF (department_id), INDEX IDX_921A380D166D1F9C (project_id), PRIMARY KEY(department_id, project_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_people (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, responsibility VARCHAR(255) NOT NULL, title VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE project_project_people ADD CONSTRAINT FK_D605B5CE166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_project_people ADD CONSTRAINT FK_D605B5CE207B8CE1 FOREIGN KEY (project_people_id) REFERENCES project_people (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_department ADD CONSTRAINT FK_D5BB9AB8166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_department ADD CONSTRAINT FK_D5BB9AB8AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE staff ADD CONSTRAINT FK_426EF392979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE staff_department ADD CONSTRAINT FK_2B4FF15BD4D57CD FOREIGN KEY (staff_id) REFERENCES staff (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE staff_department ADD CONSTRAINT FK_2B4FF15BAE80F5DF FOREIGN KEY (department_id) REFERENCES department (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE department_project ADD CONSTRAINT FK_921A380DAE80F5DF FOREIGN KEY (department_id) REFERENCES department (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE department_project ADD CONSTRAINT FK_921A380D166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE project_project_people DROP FOREIGN KEY FK_D605B5CE166D1F9C');
        $this->addSql('ALTER TABLE project_department DROP FOREIGN KEY FK_D5BB9AB8166D1F9C');
        $this->addSql('ALTER TABLE department_project DROP FOREIGN KEY FK_921A380D166D1F9C');
        $this->addSql('ALTER TABLE staff_department DROP FOREIGN KEY FK_2B4FF15BD4D57CD');
        $this->addSql('ALTER TABLE staff DROP FOREIGN KEY FK_426EF392979B1AD6');
        $this->addSql('ALTER TABLE project_department DROP FOREIGN KEY FK_D5BB9AB8AE80F5DF');
        $this->addSql('ALTER TABLE staff_department DROP FOREIGN KEY FK_2B4FF15BAE80F5DF');
        $this->addSql('ALTER TABLE department_project DROP FOREIGN KEY FK_921A380DAE80F5DF');
        $this->addSql('ALTER TABLE project_project_people DROP FOREIGN KEY FK_D605B5CE207B8CE1');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE project_project_people');
        $this->addSql('DROP TABLE project_department');
        $this->addSql('DROP TABLE staff');
        $this->addSql('DROP TABLE staff_department');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE department');
        $this->addSql('DROP TABLE department_project');
        $this->addSql('DROP TABLE project_people');
    }
}
