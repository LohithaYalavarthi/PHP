<?php
session_start();
$_SESSION['message'] = "";
include "../shared/database.php";
if (empty($_SESSION['username'])) {
  header('location:index.php');
} else {
  if (isset($_POST['submit'])) {
    $username = $_POST['susername'];
    $department = $_POST['department'];
    $semester = $_POST['semester'];
    $course = $_POST['course'];
    if ($username and $department and $semester and $course) {
      $result = mysqli_query($con, "SELECT studentname FROM `registered-courses` WHERE courseCode='$course' and studentname='$username' and departmentCode='$department' and semesterCode='$semester'");
      $count =  mysqli_num_rows($result);
      if (!($count > 0)) {
        $result = mysqli_query($con, "insert into `registered-courses`(studentname,departmentCode,semesterCode,courseCode) values('$username','$department','$semester','$course')");
        if ($result) {
          $_SESSION['message'] = "Course Registered Successfully !!";
        } else {
          $_SESSION['message'] = "Registeration not sucessful";
        }
      } else {
        $_SESSION['message'] = "Already Applied for this course !!";
      }
    } else {
      $_SESSION['message'] = "Please enter all the details";
    }
  }
?>
  <?php include "../shared/header.php" ?>

  <body>
    <div style="display:flex;">

      <?php if ($_SESSION['username'] != "") {
        include '../shared/menubar.php';
      }
      ?>
      <div style="background-color: white;margin:auto;width:500px;padding:20px">

        <?php $sql = mysqli_query($con, "select * from studentdetails where username='" . $_SESSION['username'] . "'");
        $count = 1;
        while ($row = mysqli_fetch_array($sql)) { ?>
          <form method="post" name="registercourse">
            <div class="<?php echo $_SESSION['message'] ? 'error' : "" ?>">
              <?php echo $_SESSION['message'] ?>
            </div>
            <div class="mb-3">
              <label class="form-label">Student username</label>
              <input type="text" readonly class="form-control" id="susername" name="susername" value="<?php echo $row["username"] ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Student name</label>
              <input type="text" readonly class="form-control" id="sname" name="sname" value="<?php echo $row["studentname"] ?>">
            </div>
          <?php } ?>

          <div class="mb-3">
            <label class="form-label">Batch</label>
            <div style="padding:2px">
              <?php echo date('Y'); ?>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Department</label>
            <div class="input-group mb-3">
              <select class="form-select" name="department">
                <option value="" selected>Select Department</option>
                <?php
                $sql = mysqli_query($con, "select * from department where dcode='" . $_SESSION['currentdepartment'] . "'");
                while ($row = mysqli_fetch_array($sql)) {
                  
                ?>
                    <option value="<?php echo $row['dcode']; ?>"><?php echo $row['dname']; ?></option>
                <?php 
                } ?>
              </select>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Semester</label>
            <div class="input-group mb-3">
              <select class="form-select" name="semester">
                <option value="" selected>Select Semester</option>
                <?php
                $sql = mysqli_query($con, "select * from semester where semcode='" . $_SESSION['currentsemester'] . "' ");
                while ($row = mysqli_fetch_array($sql)) { 
                ?>
                    <option value="<?php echo $row['semcode'] ?>"><?php echo $row['sname']; ?></option>
                <?php 
                } ?>
              </select>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Course</label>
            <div class="input-group mb-3">
              <select class="form-select" name="course">
                <option value="" selected>Select Course</option>
                <?php
                $sql = mysqli_query($con, "select * from courses where dcode='" . $_SESSION['currentdepartment'] . "'");
                while ($row = mysqli_fetch_array($sql)) {
                ?>
                  <option value="<?php echo $row['code']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <button type="submit" class="btn btn-primary" id="submit" name="submit">Register</button>
          </form>
      </div>

    </div>
  </body>
<?php } ?>