<?php
    $error = "";
    $db = mysqli_connect('localhost', 'root', '', 'todo');
    if($db === false) {
        die("ERROR: Could not connect. "
            . $db->connect_error);
    }
?>

<?php 
    // DELETE data in db
    if (isset($_GET['del_task'])) {
        $id = $_GET['del_task'];
        mysqli_query($db, "DELETE FROM tasks WHERE id=$id");
        header('location: index.php');
    }
?>

<body>
    <header>
        <div class="heading">
            <h2>Sugar Search TodoList with empty<h2>
        </div>
        <form method="GET" action="search">
            <input type="text" name="keywords" class="task_input" autocomplete="off">
            <input type="submit" value="Tìm kiếm" class="add_btn">
        </form>
    </header>
    <section>
        <?php 
        if(isset($_GET['keywords'])) {
            $keywords = $_GET['keywords'];
            $tasks =  mysqli_query($db, 
                "SELECT id, task, assign, email 
                FROM tasks 
                WHERE task LIKE '%{$keywords}%' 
                    OR assign LIKE '%{$keywords}%' 
                    OR email LIKE '%{$keywords}%'
                    OR id LIKE '%{$keywords}%' 
            ");
            // $query = mysqli_query($db, "SELECT task, assign, email FROM tasks")
            ?>
        <div class="result_count">
            Found <?php echo $tasks->num_rows; ?> results
        </div>
        <table>
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
                        if($tasks->num_rows) {
                            $i = 1;
                            while($row = mysqli_fetch_array($tasks)) { ?>
                <tr>
                    <td class="delete"><?php echo $i; ?></td>
                    <td class="task"><?php echo $row['task']; ?></td>
                    <td class="task"><?php echo $row['assign']; ?></td>
                    <td class="task"><?php echo $row['email']; ?></td>
                    <td class="task"><input type="checkbox" class="task_input task_checkbox"></td>
                    <td class="delete">
                        <a href="edit?id=<?php echo $row['id']; ?>">Edit</a>
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
                                $i++ ;
                            } ?>
                <?php } ?>
            </tbody>
        </table>
        <?php } ?>

    </section>
</body>

</html>