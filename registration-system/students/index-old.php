<?php
session_start();
// include "../shared/database.php";
$_SESSION['errormsg'] = "";
$username = "";
$password = "";

if (isset($_POST['submit'])) {
   $username = $_POST['studentname'];
   $password = $_POST['studentpass'];
   if ($username and $password) {
      echo "here";
      //   $query = mysqli_query($con, "SELECT * FROM studentdetails WHERE username='$username' and password='$password'");
      //   $result = mysqli_fetch_array($query);
      $page = "student-profile.php";
      $_SESSION['username'] = $_POST['studentname'];
      $_SESSION['password'] = $_POST['studentpass'];
      $hostaddress = $_SERVER['HTTP_HOST'];
      $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
      echo $hostaddress . $uri;
      header("location:http://$hostaddress$uri/$page");
      exit();
      //   if ($result > 0) {
      //       $page = "student-profile.php";
      //       $_SESSION['username'] = $_POST['studentname'];
      //       $_SESSION['password'] = $_POST['studentpass'];
      //       $hostaddress = $_SERVER['HTTP_HOST'];
      //       $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
      //       header("Location:http://$hostaddress$uri/$page");
      //       // exit();
      //   } else if ($username or $password) {
      //       $_SESSION['errormsg'] = "Invalid login, please try again";
      //   }
   } else {
      $_SESSION['errormsg'] = "Please enter the details";
   }
} else if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['admin-submit'])) {
   $page = "admin";
   $hostaddress  = $_SERVER['HTTP_HOST'];
   header("location:http://$hostaddress/registration-system/$page");
   exit();
}
?>
<?php include "../shared/header.php" ?>
<body>
   <div class="page-background">
      <div class="container page">
         <div class="row">
            <div class="col-sm">
               <p class="h1" style="margin-left:40px;margin-top:60px;color:blue">Student Login</p>
               <p class="h3" style="margin-left:40px">This will let you login as Student</p>
            </div>

            <div class="col-sm form-view">
            <form name="admin" method="post">
                  <div class="error">
                     <?php echo $_SESSION['errormsg']; ?>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Username</label>
                     <input type="text" name="studentname" value="<?php echo $username ?>" class="form-control">
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Password</label>
                     <input type="password" name="studentpass" value="<?php echo $password ?>" class="form-control">
                  </div>
                  <div class="d-grid gap-2">
                     <button type="submit" name="submit" class="btn btn-lg btn-primary">Log in</button>
                  </div>
                  <hr />
                  <div class="d-grid gap-2 col-6 mx-auto">
                     <button type="submit" name="admin-submit" class="btn btn-lg btn-success">Admin Login</button>
                  </div>
               </form>
            </div>
         </div>

      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>