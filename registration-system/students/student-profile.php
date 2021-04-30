<?php
session_start();
include "../shared/database.php";
if (empty($_SESSION['username'])) {
  header('location:index.php');
}
?>

<?php include "../shared/header.php" ?>

<body>
  <div style="display:flex;">
    <?php if ($_SESSION['username'] != "") {
      include '../shared/menubar.php';

    }
    ?>
    <?php
    $query = mysqli_query($con, "SELECT * FROM studentdetails JOIN department on 
    studentdetails.department=department.dcode JOIN semester on semester.semcode=studentdetails.currentsemester where studentdetails.username = '" . $_SESSION['username'] . "'");
    while ($row = mysqli_fetch_assoc($query)) { ?>
      <div class="card" style="width: 22rem;margin:auto">
        <div class="card-body">
          <div style="padding:10px">
            <p class="card-title">Username</p>
              <h4 class="card-text"><?php echo $row['username'] ?></h4>
          </div>
          <div style="padding:10px">
            <p class="card-title">Student name</p>
              <h4 class="card-text"><?php echo $row['studentname'] ?></h4>
          </div>
          <div style="padding:10px">
            <p class="card-title">Department</p>
              <h4 class="card-text"><?php echo $row['dname'] ?></h4>
          </div>
          <div style="padding:10px">
            <p class="card-title">Current Semester</p>
              <h4 class="card-text"><?php echo $row['sname'] ?></h4>
          </div>
        </div>
      </div>
    <?php } ?>

  </div>
</body>