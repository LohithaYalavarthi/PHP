<?php
session_start();
$_SESSION['errmsg'] = "";
include "../shared/database.php";
$coursecode = "";
$coursename = "";
$description = "";
$credits="";
$departmentcode="";
$assignprofessor="";
if (empty($_SESSION['aname'])) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $coursename = $_POST['coursename'];
        $description = $_POST['description'];
        $credits=$_POST['credits'];
        $departmentcode=$_POST['departmentcode'];
        $assignprofessor=$_POST['assignprofessor'];
        if (isset($_GET['id'])) {
            $coursecode = $_GET['id'];
            if ($coursecode and $coursename and $departmentcode) {
                $result = mysqli_query($con, "update courses set name='$coursename', description='$description', dcode='$departmentcode', credits='$credits', professorname='$assignprofessor' where code='$coursecode'");
                if ($result) {
                    $_SESSION['errmsg'] = "Course updated Successfully";
                } else {
                    $_SESSION['errmsg'] = "Course updation failed try to add different courseid";
                }
            } else {
                $_SESSION['errmsg'] = "Please enter the details";
            }
        } else {
            $coursecode = $_POST['coursecode'];
            if ($coursecode and $coursename and $departmentcode) {
                $result = mysqli_query($con, "insert into courses(code,dcode,name,professorname,description,credits) values('$coursecode','$departmentcode','$coursename','$assignprofessor','$description','$credits')");
                if ($result) {
                    $_SESSION['errmsg'] = "Course added Successfully";
                } else {
                    $_SESSION['errmsg'] = "Course addition failed try to add different courseid";
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
                $courseid = $_GET['id'];
                $result = mysqli_query($con, "select * from courses where code='$courseid'");
                $count = 1;
                while ($row = mysqli_fetch_array($result)) {
                    $coursecode = $row['code'];
                    $coursename =  $row['name'];
                    $description = $row['description'];
                    $credits=$row['credits'];
                    $departmentcode=$row['dcode'];
                    $assignprofessor=$row['professorname'];

            ?>
                    <?php include "../shared/form-share.php" ?>
            <?php }
            } else {
                include "../shared/form-share.php";
            } ?>
        </div>
    </div>
<?php } ?>