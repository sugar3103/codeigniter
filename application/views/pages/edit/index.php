<?php
    $error = "";
    $db = mysqli_connect('localhost', 'root', '', 'todo');
    if($db === false) {
        die("ERROR: Could not connect. "
            . $db->connect_error);
    }
?>
<?php
    $id = "";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $task = $_POST['task'];
        $assign = $_POST['assign'];
        $email = $_POST['email'];
        
        if (empty($task) || empty($assign) || empty($email)) {
            $error = "You must fill in all task";
        } else {
            mysqli_query($db, "UPDATE tasks SET task = '$task', assign = '$assign', email = '$email' WHERE id = '$id' ");
            header('location: home');
        }
    }
    $tasks = mysqli_query($db, "SELECT * FROM tasks WHERE id='$id'")
?>

<body>
    <header>
        <div class="heading">

            <?php while ($row = mysqli_fetch_array($tasks)) { ?>
            <form method="POST" action="edit">
                <input style="display: none" type="text" name="id" value="<?php echo $id?>" readonly>
                <input type="text" name="task" class="task_input" required value="<?php echo $row['task'] ?>"><br>
                <input type="text" name="assign" class="task_input" required value="<?php echo $row['assign'] ?>"><br>
                <input type="email" name="email" class="task_input" required value="<?php echo $row['email'] ?>"><br>
                <button type="submit" class="add_btn" name="submit">Sửa</button>
            </form>
            <?php } ?>
        </div>
    </header>
</body>

</html>