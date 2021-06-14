<?php 
require_once("include/config.php");
if(!empty($_POST["PatientEmail"])) {
	$PatientEmail= $_POST["PatientEmail"];
	
		$result =mysqli_query($con,"SELECT PatientEmail FROM tblpatient WHERE PatientEmail='$PatientEmail'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> El correo ya existe .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Correo electrónico disponible para registro.</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
