<?php $page="grades";?>
<?php
session_start();
include "../shared/database.php";
if (empty($_SESSION['aname'])) {
    header('location:index.php');
} else {
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
                        <th scope="col">student ID</th>
                        <th scope="col">student Name</th>
                        <th scope="col">Registered Date</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        $result = mysqli_query($con, "select * from studentdetails");
                        $count = 1;
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr class="table-active">
                            <td><?php echo $count; ?></td>
                            <td><?php echo $row['username'] ?></td>
                            <td><?php echo $row['studentname']; ?></td>
                            <td><?php echo $row['createddate']; ?></td>
                            <td>
                            <div style="display:inline-block">
                                        <a href="add-grades.php?id=<?php echo $row['username'] ?>">
                                            <button type="button" name="edit" class="btn btn-primary">Edit</button>
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