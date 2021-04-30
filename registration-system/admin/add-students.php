<?php
session_start();
$_SESSION['errmsg'] = "";
include "../shared/database.php";
$studentusername="";
$studentname="";
$studentpass="";
$semester="";
$department ="";
if (empty($_SESSION['aname'])) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $studentusername = $_POST['username'];
        $studentname = $_POST['studentname'];
        $studentpass = $_POST['studentpass'];
        $semester = $_POST['currentsemester'];
        $department = $_POST['department'];
        if ($studentusername and $studentname and $studentpass and $semester and $department) {
            $result = mysqli_query($con, "insert into studentdetails(username,studentname,password,currentsemester,department) values('$studentusername','$studentname','$studentpass','$semester','$department')");
            if ($result) {
                $_SESSION['errmsg'] = "Student added Successfully";
            } else {
                $_SESSION['errmsg'] = "Student not added, Please check your details and try to give different username.";
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
            <form method="post">
                <div class="<?php echo $_SESSION['errmsg'] ? "error" : "" ?>">
                    <?php echo $_SESSION['errmsg']; ?>
                    <?php echo $_SESSION['errmsg'] = ""; ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Student Username</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $studentusername ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Student Name</label>
                    <input type="text" class="form-control" name="studentname" value="<?php echo $studentname ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Change Student Password</label>
                    <input type="text" class="form-control" name="studentpass" value="<?php echo $studentpass ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Semester</label>
                    <div class="input-group mb-3">
                        <select class="form-select" name="currentsemester">
                            <option value="" selected>Select Semester</option>
                            <?php
                            $sql = mysqli_query($con, "select * from semester");
                            while ($row = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?php echo $row['semcode'] ?>"><?php echo $row['sname']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Department</label>
                    <div class="input-group mb-3">
                        <select class="form-select" name="department">
                            <option value="" selected>Select Department</option>
                            <?php
                            $sql = mysqli_query($con, "select * from department");
                            while ($row = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?php echo $row['dcode']; ?>"><?php echo $row['dname']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Add Student</button>
            </form>
        </div>
    </div>
<?php } ?>