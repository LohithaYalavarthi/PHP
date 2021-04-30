<?php $page = "grades"; ?>
<?php
session_start();
include "../shared/database.php";
if (empty($_SESSION['aname'])) {
    header('location:index.php');
} else {
    if (isset($_GET['delete'])) {
        $result = mysqli_query($con, "delete from courses where code = '" . $_GET['id'] . "'");
        $_SESSION['errmsg'] = "Course deleted Successfully";
}
?>
    <?php include "../shared/header.php" ?>
    <div style="display:flex;">
        <?php if ($_SESSION['aname'] != "") {
            include '../shared/admin-menubar.php';
        }
        ?>
        <div style="margin:auto;width:800px;">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">course Code</th>
                        <th scope="col">course Name</th>
                        <th scope="col">Department Code</th>
                        <th scope="col">Department Name</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($con, "SELECT * FROM courses JOIN department on 
                    courses.dcode=department.dcode");
                    $count = 1;
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr class="table-active">
                            <td><?php echo $count; ?></td>
                            <td><?php echo $row['code'] ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['dcode']; ?></td>
                            <td><?php echo $row['dname']; ?></td>
                            <td>
                                <div style="display:inline-block">
                                    <a href="add-course.php?id=<?php echo $row['code'] ?>">
                                        <button type="button" name="edit" class="btn btn-primary">Edit</button>
                                    </a>
                                    <a href="view-courses.php?id=<?php echo $row['code'] ?>&delete=delete" onClick="return confirm('Are you sure you want to delete?')">
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