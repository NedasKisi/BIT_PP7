### Sprint 7/ PP7

## Project manager - PHP/MySQL

## How to launch

- Download [XAMPP](https://www.apachefriends.org/index.html) and install it.
- Downlaod [MySQL Workbench](https://www.mysql.com/products/workbench/) and install it.
- Download or clone git repository BIT_PP7 and place it inside htdocs directory (XAMPP).
- Run XAMPP and start Apache and MySQL server.
- Open MySQL workbench and create a server with these settings:

```sh
Server name : localhost
Username : root
There is no password so leave it blank. If you add password please config database.php accordingly.
```

- On MySQL workbench and run code to create database with mock data or just launch project without data.
- Open your browser and in the searchbar type in:

```sh
localhost/BIT_PP7
```

- Database with empty tables will be created on launch or you can launch MySQL Workbench before opening project and run SQL file provided (creates database with tables and data).
- Make sure that server details inside database.php file (servername, username, password) match with created server, otherwise you won't be able to launch the project.
- Add, remove, update people and projects at will.

```diff
- PLEASE NOTE : You can launch the project without any data(PHP will setup database and tables).
- For preset data use MySQL file to import data (file is provided).
```

## How to use

- Setup your MySQL server and launch project.
- You can create projects and people attending them by pressing add buttons. More than 1 person can join a project.
  - Please note: you will not be able to add a person if there are no projects created!
- You can delete projects/people by pressing delete buttons.
- You can update projects/people by pressing update buttons.
- You can assign people to projects by selecting them from dropdown list or update projects by using multiselect.

```diff
 When updating projects to use multiselect press and hold CTRL button and left-click on names you want to add or remove from project.
 For Apple users press press and hold CMD button and left-click on names.
```

## Project tasks

- Create working project manager.
- Display projects/people from MySQL server.
- Create Add forms projects/people .
- Create Delete functionality for projects/people.
- Create Update forms for projects/people .
- Upload to github.
- Keep the code clean - structure ,validity, website, github.
- Create readme.md.

## Project workflow

- 1.Layout creation using CSS , database.php file creation.
- 2.Added working ADD forms for projects/people.
- 3.Added working Delete buttons for projects/people.
- 3.Added working Update forms for projects/people.
- 4.Added readme.

---

Uploaded to github to satisfy condtional commits.

---

## Goal

To create simple project manager using MySql and PHP.

## About The Project

Learning project: PHP/MySQL.
Project is done using Raw PHP, MySQL and CSS.
