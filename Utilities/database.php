<?php

$servername = "localhost";
$username = "root";
$password = "";
$databasename = "projectsdb";

$connection = mysqli_connect($servername, $username, $password); // Create connection

if (!$connection->connect_error) {
        $sql = 'CREATE DATABASE IF NOT EXISTS ' . $databasename . ';';
        $connection->query($sql); // Creating database

        $connection->select_db($databasename); // Selecting database if already exists
        if (!$connection) { // Connection status check
                die("Connection failed: " . mysqli_connect_error());
        }

        $sql = 'CREATE TABLE IF NOT EXISTS projects (
                id INT AUTO_INCREMENT PRIMARY KEY,
                project_name VARCHAR(30) NOT NULL);';
        $connection->query($sql); // Projects table

        $sql = 'CREATE TABLE IF NOT EXISTS people (
                id INT auto_increment primary key,
                first_name VARCHAR(30) NOT NULL,
                last_name VARCHAR(30) NOT NULL);';
        $connection->query($sql); // People table

        $sql = 'CREATE TABLE IF NOT EXISTS projects_people (
                prj_id INT,
                pers_id INT,
                FOREIGN KEY (prj_id) REFERENCES projects(id) ON UPDATE CASCADE ON DELETE CASCADE,
                FOREIGN KEY (pers_id) REFERENCES people(id) ON UPDATE CASCADE ON DELETE CASCADE);';
        $connection->query($sql); // Reference table creation between People and Projects

}
