<?php
if (isset($_POST['project_name']) != "") { // Check if Project name has been entered
    $sql = 'SELECT * FROM projects WHERE project_name = "' . $_POST['project_name'] . '";'; // Check if duplicate entry does not already exist
    $result = $connection->query($sql);


    if (mysqli_num_rows($result) == 0 && $_GET['action'] == 'add') { // ADD PROJECT
        $sql = 'INSERT INTO projects (project_name) VALUES ("' . $_POST['project_name'] . '");';
        $connection->query($sql);
        unset($_POST['project_name']);
        header('location:./?path=' . $_GET['path']);
        exit;
    }
}
