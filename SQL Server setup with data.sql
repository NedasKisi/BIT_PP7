CREATE DATABASE projectsdb;

USE projectsdb;

CREATE TABLE people (
	id INT auto_increment primary key,
	first_name VARCHAR(30) NOT NULL,
	last_name VARCHAR(30) NOT NULL);

CREATE TABLE projects (
	id INT AUTO_INCREMENT PRIMARY KEY,
	project_name VARCHAR(30) NOT NULL);
    
INSERT INTO projects (project_name)
VALUES ("HTML"), ("CSS"), ("JavaScript"), ("REACT"), ("PHP"), ("MySQL");

INSERT INTO people (first_name, last_name)
VALUES ("Jonas","Jonaitis"), ("Petras","Petraitis"), ("Tomas","Tomaitis"), ("Dalia","Dalytė"), ("Rita","Ritienė");

CREATE TABLE projects_people (
	prj_id INT,
	pers_id INT,
	FOREIGN KEY (prj_id) REFERENCES projects(id) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (pers_id) REFERENCES people(id) ON UPDATE CASCADE ON DELETE CASCADE);
    
INSERT INTO projects_people (prj_id, pers_id)
VALUES (1,2), (1,4), (2,1), (2,5), (3,3);