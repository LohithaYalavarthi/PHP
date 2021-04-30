<?php
session_start();
$_SESSION['errmsg'] = "";
include "../shared/database.php";
$dcode = "";
$name = "";
if (empty($_SESSION['aname'])) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        if (isset($_GET['id'])) {
            $dcode = $_GET['id'];
            if ($dcode and $name) {
                $result = mysqli_query($con, "update department set dname='$name' where dcode='$dcode'");
                echo var_dump($result);
                if ($result) {
                    $_SESSION['errmsg'] = "Course updated Successfully";
                } else {
                    $_SESSION['errmsg'] = "Course updation failed try to add different courseid";
                }
            } else {
                $_SESSION['errmsg'] = "Please enter the details";
            }
        } else {
            $dcode = $_POST['dcode'];
            if ($dcode and $name) {
                $result = mysqli_query($con, "insert into department(dcode,dname) values('$dcode','$name')");
                if ($result) {
                    $_SESSION['errmsg'] = "Department added Successfully";
                } else {
                    $_SESSION['errmsg'] = "Department addition failed try to add different departmentid";
                }
            } else {
                $_SESSION['errmsg'] = "Please enter the details";
            }
        }
    }
?>
    <?php include "../shared/header.php" ?>

    <div style="display:flex;">
        <?php if ($_SESSION['aname'] != "") {
            include '../shared/admin-menubar.php';
        }
        ?>
        <div style="margin:auto;width:800px;padding:20px;background-color:darkgray">
            <?php
            if (isset($_GET['id'])) {
                $departmentid = $_GET['id'];
                $result = mysqli_query($con, "select * from department where dcode='$departmentid'");
                $count = 1;
                while ($row = mysqli_fetch_array($result)) {
                    $dcode = $row['dcode'];
                    $name =  $row['dname'];
            ?>
                    <?php include "../shared/form-department.php"; ?>

            <?php }
            } else {
                include "../shared/form-department.php";
            } ?>
        </div>
    </div>
<?php } ?>