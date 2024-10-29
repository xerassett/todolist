<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="TODOLIST.css">
    <title>to do list</title>
</head>
<body>
    <div id="corp">  
        <h1>TO DO LIST APP</h1>
        <div id="searchbarre">
            <form method="POST">
                <input id="add" type="text" name="task" placeholder="Add Todo...">
                <button type="submit" onclick="addTask()">ADD</button>
            </form>
        </div>
        <?php 
            if (isset($_POST["task"]) && !empty($_POST["task"])) {
                $task = [htmlspecialchars($_POST["task"])];
                echo "<div class=opt>";
                foreach($task as $item) {
                    echo "<option>" . $item . "</option>";
                    echo "<button type=submit name=delete>X</button>";
                }
                echo "</div>";
            }

        ?>      
    </div>
</body>
</html>