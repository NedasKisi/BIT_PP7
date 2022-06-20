<?php

include_once './Utilities/database.php'; //Connection to database and setup

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Sprint_2</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <div class="header container">
            <div class="link-wrap">
                <a href="./?path=projects">Projects</a><br>
                <a href="./?path=people">People</a>
            </div>
            <h1><?php $path = $_GET['path'] ?? 'projects';
                echo $path; ?></h1>
        </div>
    </header>

    <div class="container">
        <?php
        if ($path == 'people') {
            include './Utilities/people.php'; // Loads people data
        } else if ($path == 'projects') {
            include './Utilities/projects.php'; // Loads projects data
        }
        ?>
    </div>

</body>

</html>