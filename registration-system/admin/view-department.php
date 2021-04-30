<?php $page = "grades"; ?>
<?php
session_start();
include "../shared/database.php";
if (empty($_SESSION['aname'])) {
    header('location:index.php');
} else {
    if (isset($_GET['delete'])) {
        $result = mysqli_query($con, "delete from department where dcode = '" . $_GET['id'] . "'");
        $_SESSION['errmsg'] = "Semester deleted Successfully";
}
?>
    <?php include "../shared/header.php" ?>
    <div style="display:flex;">
        <?php if ($_SESSION['aname'] != "") {
            include '../shared/admin-menubar.php';
        }
        ?>
        <div style="margin:auto;width:700px;">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Department code</th>
                        <th scope="col">Department name</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($con, "select * from department");
                    $count = 1;
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr class="table-active">
                            <td><?php echo $count; ?></td>
                            <td><?php echo $row['dcode'] ?></td>
                            <td><?php echo $row['dname']; ?></td>
                            <td>
                                <div style="display:inline-block">
                                    <a href="add-department.php?id=<?php echo $row['dcode'] ?>">
                                        <button type="button" name="edit" class="btn btn-primary">Edit</button>
                                    </a>
                                    <a href="view-department.php?id=<?php echo $row['dcode'] ?>&delete=delete" onClick="return confirm('Are you sure you want to delete?')">
                                        <button class="btn btn-danger" name="delete">Delete</button>
                                    </a>
                                </div>

                            </td>

                        </tr>
                    <?php
                        $count++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

    </html>
<?php } ?>