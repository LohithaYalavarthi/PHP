<?php
session_start();
$_SESSION['username']=="";
$_SESSION['studentname']=="";
session_unset();
$_SESSION['errmsg']="Logged out Successfully";
?>
<script language="javascript">
document.location="index.php";
</script>


