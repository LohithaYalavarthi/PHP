<?php
session_start();
$_SESSION['errmsg'] = "";
include "../shared/database.php";
if (empty($_SESSION['aname'])) {
    header('location:index.php');
} else {
    if (isset($_GET['delete'])) {
        mysqli_query($con, "delete from studentdetails where username = '" . $_GET['id'] . "'");
        $_SESSION['errmsg'] = "Record Deleted Successfully";
    }

?>

    <?php include "../shared/header.php" ?>

    <body>
        <div style="display:flex;">
            <?php if (!empty($_SESSION['aname'])) {
                include '../shared/admin-menubar.php';
            }
            ?>
            <div style="margin:auto;width:800px;padding:20px">
                <table class="table table-primary">
                    <div class="<?php echo $_SESSION['errmsg'] ? "error" : "" ?>">
                        <?php echo $_SESSION['errmsg']; ?>
                        <?php echo $_SESSION['errmsg'] = ""; ?>
                    </div>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Student Username</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Creation Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = mysqli_query($con, "select * from studentdetails");
                        $count = 1;
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['studentname']; ?></td>
                                <td><?php echo $row['createddate']; ?></td>
                                <td>
                                    <div style="display:inline-block">
                                        <a href="edit-student-details.php?id=<?php echo $row['username'] ?>">
                                            <button type="button" name="edit" class="btn btn-primary">Edit</button>
                                        </a>
                                        <a href="view-students.php?id=<?php echo $row['username'] ?>&delete=delete" onClick="return confirm('Are you sure you want to delete?')">
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
        
    </body>

<?php } ?>