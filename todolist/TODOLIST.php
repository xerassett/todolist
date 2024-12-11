<?php
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="TODOLIST.css">
    <title>To-Do List</title>
</head>
<body>
    <div id="corp">  
        <h1>TO DO LIST APP</h1>
        <div id="searchbarre">
            <form method="POST">
                <input id="add" type="text" name="task" placeholder="Add Todo...">
                <button type="submit" name="add">ADD</button>
            </form>
        </div>
        <?php 
            if (!isset($_SESSION['tasks'])) {
                $_SESSION['tasks'] = [];
            }
            if (isset($_POST['add']) && !empty(trim($_POST['task']))) {
                $task = htmlspecialchars($_POST['task']);
                $_SESSION['tasks'][] = $task;
            }
            if (isset($_POST['delete'])) {
                $index = intval($_POST['delete']);
                if (isset($_SESSION['tasks'][$index])) {
                    unset($_SESSION['tasks'][$index]);
                    $_SESSION['tasks'] = array_values($_SESSION['tasks']); 
                }
            }
            if (!empty($_SESSION['tasks'])) {
                echo '<ul>';
                foreach ($_SESSION['tasks'] as $index => $item) {
                    echo '<li>';
                    echo htmlspecialchars($item);
                    echo ' <form method="POST" style="display:inline;">';
                    echo '<button type="submit" name="delete" value="' . $index . '">X</button>';
                    echo '</form>';
                    echo '</li>';
                }
                echo '</ul>';
            } else {
                echo '<p>Pas de tâches actuellement.</p>';
            }
        ?>    
    </div>
</body>
</html>
