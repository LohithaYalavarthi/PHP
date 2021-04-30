<?php
session_start();
$_SESSION['errmsg'] = "";
include "../shared/database.php";
if (empty($_SESSION['aname'])) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $studentid = $_GET['id'];
        $studentname = $_POST['studentname'];
        $studentpass = $_POST['studentpass'];
        if ($studentid and $studentname and $studentpass) {
            $result = mysqli_query($con, "update studentdetails set studentname='$studentname', password='$studentpass' where username='$studentid'");
            if ($result) {
                $_SESSION['errmsg'] = "Student record updated Successfully !!";
            } else {
                $_SESSION['errmsg'] = "Student Record not update";
            }
        } else {
            $_SESSION['errmsg'] = "Please enter the details";
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
            $studentid = $_GET['id'];
            $result = mysqli_query($con, "select * from studentdetails where username='$studentid'");
            $idvalue = 1;
            while ($row = mysqli_fetch_array($result)) { ?>
                <form method="post">
                    <div class="<?php echo $_SESSION['errmsg'] ? "error" : "" ?>">
                        <?php echo $_SESSION['errmsg']; ?>
                        <?php echo $_SESSION['errmsg']= ""; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Student Username</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $row['username'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Student Name</label>
                        <input type="text" class="form-control" name="studentname" value="<?php echo $row['studentname'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Change Student Password</label>
                        <input type="text" class="form-control" name="studentpass" value="<?php echo $row['password'] ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            <?php } ?>
        </div>
    </div>
<?php } ?>