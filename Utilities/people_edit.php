<?php
if (isset($_POST['first_name']) != "" && isset($_POST['last_name']) != "") { // Check if First and Last names have been entered
    $sql = 'SELECT * FROM people WHERE first_name = "' . $_POST['first_name'] . '" AND last_name = "' . $_POST['last_name'] . '";'; // Check if duplicate entries does not already exist
    $result = $connection->query($sql);

    // ADD NEW PERSON TO TABLE
    if (mysqli_num_rows($result) == 0 && $_GET['action'] == 'add') {
        // People table update
        $sql = 'INSERT INTO people (first_name, last_name) VALUES ("' . $_POST['first_name'] . '", "' . $_POST['last_name'] . '");';
        $connection->query($sql);
        unset($_POST['first_name']);
        unset($_POST['last_name']);

        if (isset($_POST['project_id']) && $_POST['project_id'] != 0) {
            $sql = 'SHOW TABLE STATUS LIKE "people";';
            $result = $connection->query($sql);
            $row = $result->fetch_assoc();
            $next_id = $row['Auto_increment'] - 1;
            $sql = 'INSERT INTO projects_people VALUES (' . $_POST['project_id'] . ', ' . $next_id . ');';
            $connection->query($sql);
        }

        header('location:./?path=' . $_GET['path']);
        exit;
    } elseif ($_GET['action'] == 'update') { // UPDATE EXISTING PERSON 
        // People table update
        $sql = 'UPDATE people SET first_name = "' . $_POST['first_name'] . '", last_name = "' . $_POST['last_name'] . '" WHERE id = ' . $_GET['id'] . ';';
        print $sql;
        $connection->query($sql);
        unset($_POST['first_name']);
        unset($_POST['last_name']);

        // Projects_People table update
        $sql = 'DELETE FROM projects_people WHERE pers_id = ' . $_GET['id'] . ';';
        $connection->query($sql);

        if (isset($_POST['project_id']) && $_POST['project_id'] != 0) {  //Check condition if id not 0
            $sql = 'INSERT INTO projects_people VALUES (' . $_POST['project_id'] . ', ' . $_GET['id'] . ');';
            $connection->query($sql);
        }

        unset($_POST['project_name']);

        header('location:./?path=' . $_GET['path']);
        exit;
    }
}
