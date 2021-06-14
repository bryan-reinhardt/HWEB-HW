<?php 
require_once("include/config.php");
if(!empty($_POST["patcontact"])) {
	$patcontact= $_POST["patcontact"];
	
		$result =mysqli_query($con,"SELECT 	PatientContno FROM tblpatient WHERE PatientContno='$patcontact'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> El Documento ya existe.</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Numero de Documento listo para registrar.</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
