<?php
session_start();
include('include/config.php');
$_SESSION['login']=="";
date_default_timezone_set('America/Costa_Rica');
$ldate=date( 'd-m-Y h:i:s A', time () );
mysqli_query($con,"UPDATE userlog  SET logout = '$ldate' WHERE uid = '".$_SESSION['id']."' ORDER BY id DESC LIMIT 1");
session_unset();
//session_destroy();
$_SESSION['errmsg']="Has cerrado la sesión correctamente";
?>
<script language="javascript">
document.location="../index.html";
</script>
