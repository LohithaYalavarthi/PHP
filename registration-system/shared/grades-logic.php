<?php
session_start();
include "../shared/database.php";
if (empty($_SESSION['username'])) {
    header('location:index.php');
} else {
?>
    <?php include "../shared/header.php" ?>
    <div style="display:flex;">
        <?php if ($_SESSION['username'] != "") {
            include '../shared/menubar.php';
        }
        ?>
        <div style="margin:auto;width:700px;">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Course Id</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Department Name</th>
                        <th scope="col">Professor name</th>
                        <th scope="col">Semester</th>
                        <?php if($page == "grades") {?>
                        <th scope="col">Grade</th>
                   <?php }?>
                        <th scope="col">Registered Date</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($con, "select `registered-courses`.`courseCode` as courseId, courses.professorname as professorname ,`registered-courses`.`grades` as grade, courses.name as coursename,department.dname as dept,`registered-courses`.`registeredDate` as regdate ,semester.sname as sem from `registered-courses` join courses on courses.code=`registered-courses`.`courseCode` join department on department.dcode=`registered-courses`.`departmentCode` join semester on semester.semcode=`registered-courses`.`semesterCode` where `registered-courses`.`studentname`='" . $_SESSION['username'] . "'");
                    $count = 1;
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr class="table-active">
                            <td><?php echo $count; ?></td>
                            <td><?php echo $row['courseId'] ?></td>
                            <td><?php echo $row['coursename']; ?></td>
                            <td><?php echo $row['dept']; ?></td>
                            <td><?php echo $row['professorname']; ?></td>
                            <td><?php echo $row['sem']; ?></td>
                            <?php if($page == "grades") {?>
                            <td><?php echo $row['grade'] ?? "Not assigned" ?></td>
                            <?php }?>
                            <td><?php echo $row['regdate']; ?></td>

                        </tr>
                    <?php
                        $count++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
    </html>
<?php } ?>