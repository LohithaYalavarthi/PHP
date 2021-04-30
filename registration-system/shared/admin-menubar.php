<style>
    .nav-item a.active {
        background-color: #385898;
        padding: 10px;
        color: white
    }

    a {
        color: white;
        margin-top: 10px;
    }
</style>

<div style="background-color:#242424;padding:15px;padding-left:1;display:inline-block;color:white">

    <ul class="nav" style="display:inline-block">
        <li style="padding:10px;padding-left:1px;text-transform:uppercase">
            <h3> Welcome <span style="color:#fff"><?php echo $_SESSION['aname'] ?></span> </h3>
        </li>
        <li class="nav-item">
            <a href="view-students.php" class="nav-link <?php echo ($_SERVER["REQUEST_URI"] == '/registration-system/admin/view-students.php') ? 'active' : ''; ?>">Manage Students </a>
        </li>
        <li class="nav-item">
            <a href="add-students.php" class="nav-link <?php echo ($_SERVER["REQUEST_URI"] == '/registration-system/admin/add-students.php') ? 'active' : ''; ?>">Add Students </a>
        </li>
        <li class="nav-item">
            <a href="view-grades.php" class="nav-link <?php echo ($_SERVER["REQUEST_URI"] == '/registration-system/admin/view-grades.php') ? 'active' : ''; ?>">Add Grades</a>
        </li>
        <li class="nav-item">
            <a href="add-course.php" class="nav-link <?php echo ($_SERVER["REQUEST_URI"] == '/registration-system/admin/add-course.php') ? 'active' : ''; ?>">Add Courses</a>
        </li>
        <li class="nav-item">
            <a href="add-semester.php" class="nav-link <?php echo ($_SERVER["REQUEST_URI"] == '/registration-system/admin/add-semester.php') ? 'active' : ''; ?>">Add Semester</a>
        </li>
        <li class="nav-item">
            <a href="add-department.php" class="nav-link <?php echo ($_SERVER["REQUEST_URI"] == '/registration-system/admin/add-department.php') ? 'active' : ''; ?>">Add Department</a>
        </li>
        <li class="nav-item">
            <a href="view-courses.php" class="nav-link <?php echo ($_SERVER["REQUEST_URI"] == '/registration-system/admin/view-courses.php') ? 'active' : ''; ?>">View Courses</a>
        </li>
        <li class="nav-item">
            <a href="view-semester.php" class="nav-link <?php echo ($_SERVER["REQUEST_URI"] == '/registration-system/admin/view-semester.php') ? 'active' : ''; ?>">View Semester</a>
        </li>
        <li class="nav-item">
            <a href="view-department.php" class="nav-link <?php echo ($_SERVER["REQUEST_URI"] == '/registration-system/admin/view-department.php') ? 'active' : ''; ?>">View Department</a>
        </li>
        <li class="nav-item">
            <a href="search-registeredcourses.php" class="nav-link <?php echo ($_SERVER["REQUEST_URI"] == '/registration-system/admin/search-registeredcourses.php') ? 'active' : ''; ?>">Search Registered Courses</a>
        </li>
        <li class="nav-item">
            <a href="logout.php" class="nav-link <?php echo ($_SERVER["REQUEST_URI"] == '/registration-system/admin/logout.php') ? 'active' : ''; ?>">Logout</a>
        </li>



    </ul>
</div>