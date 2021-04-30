<?php
session_start();
$_SESSION['errmsg'] = "";
include "../shared/database.php";
$studentusername = "";
$studentname = "";
$studentpass = "";
$semester = "";
$department = "";
$grade = "";
if (empty($_SESSION['aname'])) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $studentusername = $_GET['id'];
        $studentname = $_POST['studentname'];
        $semester = $_POST['currentsemester'];
        $department = $_POST['department'];
        $grade = $_POST['grade'];
        $course = $_POST['course'];
        if ($studentusername and $studentname and $semester and $department and $grade and $course) {
            $result = mysqli_query($con, "SELECT studentname FROM `registered-courses` WHERE courseCode='$course' and studentname='$studentusername' and departmentCode='$department' and semesterCode='$semester'");
            $count =  mysqli_num_rows($result);
            if ($count > 0) {
                $ret = mysqli_query($con, "update `registered-courses` set grades='$grade' where studentname='$studentusername' and courseCode='$course' and departmentCode='$department' and semesterCode='$semester'");
                if ($ret) {
                    $_SESSION['errmsg'] = "Grades updated Successfully !!";
                } else {
                    $_SESSION['errmsg'] = "Grade update failed";
                }
            } else {
                $_SESSION['errmsg'] = "No record Applied for this course !!";
            }
        } else {
            $_SESSION['errmsg'] = "Please enter all the details";
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
            $username = $_GET['id'];
            $sql = mysqli_query($con, "select * from studentdetails where username='$username'");
            $count = 1;
            while ($row = mysqli_fetch_array($sql)) { ?>
                <form method="post">
                    <div class="<?php echo $_SESSION['errmsg'] ? "error" : "" ?>">
                        <?php echo $_SESSION['errmsg']; ?>
                        <?php echo $_SESSION['errmsg'] = ""; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Student Username</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $row['username'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Student Name</label>
                        <input type="text" class="form-control" name="studentname" value="<?php echo $row['studentname']  ?>">
                    </div>
                <?php } ?>
                <div class="mb-3">
                    <label class="form-label">Semester</label>
                    <div class="input-group mb-3">
                        <select class="form-select" name="currentsemester">
                            <option value="" selected>Select Semester</option>
                            <?php
                            $username = $_GET['id'];
                            $sql = mysqli_query($con, "select DISTINCT `registered-courses`.`semesterCode` as semcode, semester.sname as semestername from `registered-courses`
                            join semester on semester.semcode=`registered-courses`.`semesterCode` where `registered-courses`.`studentname`='$username'");
                            while ($row = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?php echo $row['semcode'] ?>"><?php echo $row['semestername']; ?></option>
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
                            $sql = mysqli_query($con, "select DISTINCT `registered-courses`.`departmentCode` as dcode, department.dname as departmentname from `registered-courses` join department on department.dcode=`registered-courses`.`departmentCode` where `registered-courses`.`studentname`='$username'
                            ");
                            while ($row = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?php echo $row['dcode']; ?>"><?php echo $row['departmentname']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Course</label>
                    <div class="input-group mb-3">
                        <select class="form-select" name="course">
                            <option value="" selected>Select Course</option>
                            <?php
                            $sql = mysqli_query($con, "select DISTINCT `registered-courses`.`courseCode` as ccode, courses.name as cname from `registered-courses` join courses on courses.code=`registered-courses`.`courseCode` where `registered-courses`.`studentname`='$username'");
                            while ($row = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?php echo $row['ccode']; ?>"><?php echo $row['cname']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Grade</label>
                    <div class="input-group mb-3">
                        <select class="form-select" name="grade">
                            <option value="" selected>Select Grade</option>
                            <option value="6.5">6.5</option>
                            <option value="7.5">7.5</option>
                            <option value="8.5">8.5</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Add Grade</button>
                </form>
        </div>
    </div>
<?php } ?>