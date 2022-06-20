<?php
require './Utilities/projects_edit.php';
?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Project</th>
            <th>People Involved</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php // READ PEOPLE TABLE IN DATABASE
        $sql = 'SELECT projects.id, project_name, group_concat(concat(first_name, " ", last_name) SEPARATOR "<br>")
                    FROM projects
                    LEFT JOIN projects_people
                    ON projects.id = prj_id
                    LEFT JOIN people
                    ON pers_id = people.id
                    GROUP BY projects.id;';
        $result = $connection->query($sql);

        if (mysqli_num_rows($result) > 0) { // Forming table with read data
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                for ($i = 0; $i < count($row); $i++) {
                    echo '<td>';
                    echo $row[array_keys($row)[$i]];
                    echo '</td>';
                }
            }
        }
        echo '<tr><td></td><td><button><a href="?path=projects&action=add" class="add-btn">ADD NEW PROJECT</a></button></td></tr>'; // Inserting add button at the last table row
        ?>
    </tbody>
</table>

<?php
if (isset($_GET['action']) && $_GET['action'] == 'add') { // ADD NEW PROJECT FORM
    echo '<form method="POST">
            <h3>Add new project</h3>
            <label for="project_name">Project name:</label>
            <input type="text" name="project_name" id="project_name" minlength="2" maxlength="35" size="10" required>
            </select>
            <button type="submit" name="add">Add</button>
        </form>';
}
?>