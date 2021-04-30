<style>
    .nav-item a.active {
        background-color: #385898;
        padding: 10px;
        color: white
    }

    a {
        color: black;
        margin-top: 10px;
    }
</style>
<div style="background-color: #fff;padding:15px;padding-left:1;display:inline-block;height:100vh">
    <ul class="nav" style="display:inline-block">
        <li style="padding:10px;padding-left:1px;text-transform:uppercase">
            <h3> Welcome <span style="color:#385898"><?php echo $_SESSION['username'] ?></span> </h3>
        </li>
        <li class="nav-item">
            <a href="student-profile.php" class="nav-link <?php echo ($_SERVER["REQUEST_URI"] == '/registration-system/students/student-profile.php') ? 'active' : ''; ?>">My Profile </a>
        </li>
        <li class="nav-item">
            <a href="registered-courses.php" class="nav-link <?php echo ($_SERVER["REQUEST_URI"] == '/registration-system/students/registered-courses.php') ? 'active' : ''; ?>">My Courses </a>
        </li>
        <li class="nav-item">
            <a href="grades.php" class="nav-link <?php echo ($_SERVER["REQUEST_URI"] == '/registration-system/students/grades.php') ? 'active' : ''; ?>">My Grades</a>
        </li>
        <li class="nav-item">
            <a href="register-course.php" class="nav-link <?php echo ($_SERVER["REQUEST_URI"] == '/registration-system/students/register-course.php') ? 'active' : ''; ?>">Course Registration</a>
        </li>
        <li class="nav-item">
            <a href="search-courses.php" class="nav-link <?php echo ($_SERVER["REQUEST_URI"] == '/registration-system/students/search-courses.php') ? 'active' : ''; ?>">Search Courses</a>
        </li>
        <li class="nav-item">
            <a href="logout.php" class="nav-link <?php echo ($_SERVER["REQUEST_URI"] == '/registration-system/students/logout.php') ? 'active' : ''; ?>">Logout</a>
        </li>
        

    </ul>
</div>