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
    } else // UPDATE PROJECT
        if ($_GET['action'] == 'update') {
            $sql = 'UPDATE projects SET project_name = "' . $_POST['project_name'] . '" WHERE id = ' . $_GET['id'] . ';';
            $connection->query($sql);
            $sql = 'DELETE FROM projects_people WHERE prj_id = ' . $_GET['id'] . ';';
            $connection->query($sql);

            if (is_array($_POST['people_id'])) {
                foreach ($_POST['people_id'] as $id) {
                    $sql = 'INSERT INTO projects_people VALUES (' . $_GET['id'] . ', ' . $id . ');';
                    $connection->query($sql);
                }
            }
            unset($_POST['project_name']);
            header('location:./?path=' . $_GET['path']);
            exit;
        }
}
