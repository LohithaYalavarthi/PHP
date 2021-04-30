<?php $page = "grades"; ?>
<?php
session_start();
include "../shared/database.php";
if (empty($_SESSION['aname'])) {
    header('location:index.php');
} else {
    if (isset($_GET['delete'])) {
        $result = mysqli_query($con, "delete from semester where semcode = '" . $_GET['id'] . "'");
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
                        <th scope="col">semester code</th>
                        <th scope="col">semester name</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($con, "select * from semester");
                    $count = 1;
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr class="table-active">
                            <td><?php echo $count; ?></td>
                            <td><?php echo $row['semcode'] ?></td>
                            <td><?php echo $row['sname']; ?></td>
                            <td>
                                <div style="display:inline-block">
                                    <a href="add-semester.php?id=<?php echo $row['semcode'] ?>">
                                        <button type="button" name="edit" class="btn btn-primary">Edit</button>
                                    </a>
                                    <a href="view-semester.php?id=<?php echo $row['semcode'] ?>&delete=delete" onClick="return confirm('Are you sure you want to delete?')">
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