<?php
    $error = "";
    $db = mysqli_connect('localhost', 'root', '', 'todo');
    if($db === false) {
        die("ERROR: Could not connect. "
            . $db->connect_error);
    }
?>

<?php
    // INSERT NEW data to db
        if (isset($_POST['submit'])) {
        $task = $_POST['task'];
        $assign = $_POST['assign'];
        $email = $_POST['email'];
        if (empty($task) || empty($assign) || empty($email)) {
            $error = "You must fill in all task";
        } else {
            mysqli_query($db, "INSERT INTO tasks (task, assign, email) VALUES ('$task', '$assign', '$email')");
            header('location: index.php');
        }
    }

    // DELETE data in db
    if (isset($_GET['del_task'])) {
        $id = $_GET['del_task'];
        mysqli_query($db, "DELETE FROM tasks WHERE id=$id");
        header('location: index.php');
    }
    $tasks = mysqli_query($db, "SELECT * FROM tasks") 
?>

<script>
const loading = document.getElementById('loading');
setTimeout(function() {
    document.getElementById('loading').style.display = "none";
    document.getElementById('after-loading').style.display = "block";
}, 3000);
</script>

<style>

</style>

<body>
    <header>
        <div class="heading">
            <h2>Sugar Todo List Application with PHP and MySQL<h2>
        </div>
    </header>
    <section id="loading">

    </section>
    <section style="display: none" id="after-loading">
        <div class="container">
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-lg modal-open-box" data-toggle="modal" data-target="#myModal">
                <h4>Thêm Task cho Staff</h4>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Thêm mới task cho Staff</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="index.php">
                                <?php if (isset($error)) { ?>
                                <p><?php echo $error ?></p>
                                <?php } ?>
                                <input type="text" name="task" class="task_input" placeholder="Task details"
                                    required><br>
                                <input type="text" name="assign" class="task_input" placeholder="Assign to "
                                    required><br>
                                <input type="email" name="email" class="task_input" placeholder="email" required><br>
                                <button type="submit" class="add_btn" name="submit">Thêm vào</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form action="search">
            <input type="text" class="task_input"
                value="Tìm kiếm trực tiếp ở đây vẫn chưa hoạt động, phải chuyển sang trang khác ------->">
            <button type="submit" class="add_btn">Tới trang tìm kiếm</button>
        </form>
        <div class="container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Task</th>
                        <th>Assign</th>
                        <th>Email</th>
                        <th>Done</th>
                        <th>Action</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($row = mysqli_fetch_array($tasks)) { ?>
                    <tr>
                        <td class="delete"><?php echo $i; ?></td>
                        <td class="task"><?php echo $row['task']; ?></td>
                        <td class="task"><?php echo $row['assign']; ?></td>
                        <td class="task"><?php echo $row['email']; ?></td>
                        <td class="task"><input type="checkbox" class="task_input task_checkbox"></td>
                        <td class="delete">
                            <a href="edit?id=<?php echo $row['id'] ?>">Edit</a>
                        </td>
                        <td class="delete">
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#<?php echo $row['id']; ?>Modal">X</button>
                            <!-- Modal -->
                            <div class="modal fade" id="<?php echo $row['id']; ?>Modal" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Bạn có chắc chắn muốn xoá task có ID
                                                <?php echo $row['id']; ?> ?</h4>
                                        </div>
                                        <!-- <div class="modal-body">
                                           
                                        </div> -->
                                        <div class="modal-footer">
                                            <a href="index.php?del_task=<?php echo $row['id']; ?>">
                                                Xoá ID <?php echo $row['id']; ?></a>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Huỷ
                                                bỏ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                    $i++;
                } ?>
                </tbody>
            </table>

        </div>
    </section>
</body>


</html>
