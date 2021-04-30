<?php
session_start();
include "../shared/database.php";
$_SESSION['errormsg'] = "";
$adminname = "";
$adminpass = "";
// $_SESSION['errmsg']="";
if (isset($_POST['admin-submit'])) {
   $adminname = $_POST['adminname'];
   $adminpass = $_POST['adminpass'];
   if ($adminname and $adminpass) {
      $query = mysqli_query($con, "SELECT * FROM admin WHERE username='$adminname' and password='$adminpass'");
      $result = mysqli_fetch_array($query);
      if ($result > 0) {
         $page = "view-students.php";
         $_SESSION['aname'] = $_POST['adminname'];
         $_SESSION['apassword'] = $_POST['adminpass'];
         $hostaddress = $_SERVER['HTTP_HOST'];
         $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
         header("location:http://$hostaddress$uri/$page");
         exit();
      } else if ($adminname or $adminpass) {
         $_SESSION['errormsg'] = "Invalid login, please try again";
      }
   } else {
      $_SESSION['errormsg'] = "Please enter the details";
   }
} else if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['submit'])) {
   $page = "students";
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
               <p class="h1" style="margin-left:40px;margin-top:60px;color:#3E0073">Admin Login</p>
               <p class="h3" style="margin-left:40px">This will let you login as Admin</p>
            </div>

            <div class="col-sm form-view">
               <form method="post">
                  <div class="<?php echo $_SESSION['errormsg'] ? "error" : "" ?>"> <?php echo $_SESSION['errormsg']; ?>
                  </div>
                  <div class="<?php echo (isset($_SESSION['errmsg']) and !empty($_SESSION['errmsg'])) ? "error" : ""?>">
                     <?php echo isset($_SESSION['errmsg']) ? $_SESSION['errmsg'] : ""; ?>
                     <?php echo $_SESSION['errmsg'] =""?>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Username</label>
                     <input type="text" name="adminname" value="<?php echo $adminname ?>" class="form-control">
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Password</label>
                     <input type="password" name="adminpass" value="<?php echo $adminpass ?>" class="form-control">
                  </div>
                  <div class="d-grid gap-2">
                     <button type="submit" name="admin-submit" style="background-color:#3E0073;color:white;" class="btn btn-lg">Log in</button>
                  </div>
                  <hr />
                  <div class="d-grid gap-2 col-6 mx-auto">
                     <button type="submit" name="submit" class="btn btn-lg btn-primary">Student Login</button>
                  </div>
               </form>
            </div>
         </div>

      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>