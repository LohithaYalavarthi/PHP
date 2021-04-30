<?php
session_start();
$_SESSION['errmsg'] = "";
include "../shared/database.php";
$semcode = "";
$sname = "";
if (empty($_SESSION['aname'])) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $sname = $_POST['sname'];
        if (isset($_GET['id'])) {
            $semcode = $_GET['id'];
            if ($semcode and $sname) {
                $result = mysqli_query($con, "update semester set sname='$sname' where semcode='$semcode'");
                if ($result) {
                    $_SESSION['errmsg'] = "Semester updated Successfully";
                } else {
                    $_SESSION['errmsg'] = "Semester updation failed try to add different courseid";
                }
            } else {
                $_SESSION['errmsg'] = "Please enter the details";
            }


        }
        else{
        $semcode = $_POST['semcode'];
        if ($semcode and $sname) {
            $result = mysqli_query($con, "insert into semester(semcode,sname) values('$semcode','$sname')");
            if ($result) {
                $_SESSION['errmsg'] = "Semester added Successfully";
            } else {
                $_SESSION['errmsg'] = "Semester addition failed try to add different semesterid";
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
                $semesterid = $_GET['id'];
                $result = mysqli_query($con, "select * from semester where semcode='$semesterid'");
                $count = 1;
                while ($row = mysqli_fetch_array($result)) {
                    $semcode = $row['semcode'];
                    $sname =  $row['sname'];
            ?>
                    <?php include "../shared/form-semester.php" ?>
            <?php }
            } else {
                include "../shared/form-semester.php";
            } ?>
          
        </div>
    </div>
<?php } ?>