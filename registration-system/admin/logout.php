<?php
session_start();
$_SESSION['aname']=="";
session_unset();
$_SESSION['errmsg']="Logged out Successfully";
?>
<script language="javascript">
document.location="index.php";
</script>
