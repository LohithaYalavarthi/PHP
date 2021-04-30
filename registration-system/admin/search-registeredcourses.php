<?php
session_start();
$count = "";
$coursename="";
include "../shared/database.php";
if (empty($_SESSION['aname'])) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $coursename = $_POST['coursename'];
        if ($coursename) {
            $result = mysqli_query($con, "select * from `registered-courses` join courses on courses.code=`registered-courses`.`courseCode` join department on department.dcode=`registered-courses`.`departmentCode` join semester on semester.semcode=`registered-courses`.`semesterCode` where `registered-courses`.`courseCode`='$coursename'");
            $count =  mysqli_num_rows($result);
        } else {
            $result = mysqli_query($con, "select * from `registered-courses` join courses on courses.code=`registered-courses`.`courseCode` join department on department.dcode=`registered-courses`.`departmentCode` join semester on semester.semcode=`registered-courses`.`semesterCode`");
            $count =  mysqli_num_rows($result);
       
        }
    } else {
        $result = mysqli_query($con, "select * from `registered-courses` join courses on courses.code=`registered-courses`.`courseCode` join department on department.dcode=`registered-courses`.`departmentCode` join semester on semester.semcode=`registered-courses`.`semesterCode`");
        $count =  mysqli_num_rows($result);
        
    }
?>
    <?php include "../shared/header.php" ?>
    <div style="display:flex;">
        <?php if ($_SESSION['aname'] != "") {
            include '../shared/admin-menubar.php';
        }
        ?>
        <div style="margin:auto;width:700px;">
        <h5 style="margin:0px!important;padding:20px">Please enter the course code to check the registered students list</h5>

            <form method="post">
                <div class="input-group mb-3">
                    <input type="text" name="coursename" class="form-control" placeholder="Please enter course code" value="<?php echo $coursename?>">
                    <button class="input-group-text" name="submit">Search</button>
            </form>
        </div>
        <?php if ($count == 0) {
        ?>
            <div class="alert alert-danger" role="alert">
                No courses Available
            </div>
        <?php } else {
        ?>
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Course Id</th>
                        <th scope="col">Department Code</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Department Name</th>
                        <th scope="col">credits</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr class="table-active">
                            <td><?php echo $count; ?></td>
                            <td><?php echo $row['studentname'] ?></td>
                            <td><?php echo $row['code'] ?></td>
                            <td><?php echo $row['dcode']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['dname']; ?></td>
                            <td><?php echo $row['credits']; ?></td>

                        </tr>
                    <?php
                        $count++;
                    } ?>
                </tbody>
            </table>
        <?php } ?>

    </div>
    </div>

    </html>
<?php } ?>