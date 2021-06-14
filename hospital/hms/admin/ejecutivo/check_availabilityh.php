
<?php 
require_once("include/config.php");
if(!empty($_POST["patcontact"])) {
	$patcontact= $_POST["patcontact"];
	
		$result =mysqli_query($con,"SELECT cama FROM habitacion WHERE cama='$patcontact'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'>la cama ya existe.</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Esta disponible la cama.</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>


<?php 
require_once("include/config.php");
if(!empty($_POST["patcontac"])) {
	$patcontac= $_POST["patcontac"];
	
		$result =mysqli_query($con,"SELECT cama FROM tblpatient WHERE cama='$patcontac'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'>La cama ya esta siendo utilizada</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Esta disponible la cama.</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>


<?php 
require_once("include/config.php");
if(!empty($_POST["patconta"])) {
	$patconta= $_POST["patconta"];
	
		$result =mysqli_query($con,"SELECT habitacion FROM tblpatient WHERE habitacion='$patconta'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'>La habitacion ya exite</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Esta disponibl para registrar.</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>




<?php 
require_once("include/config.php");
if(!empty($_POST["patcont"])) {
	$patcont= $_POST["patcont"];
	
		$result =mysqli_query($con,"SELECT piso FROM tblpatient WHERE piso='$patcont'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'>El piso ya existe</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Esta disponibl para registrar.</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>

<?php 
require_once("include/config.php");
if(!empty($_POST["patcontacs"])) {
	$patcontacs= $_POST["patcontacs"];
	
		$result =mysqli_query($con,"SELECT contactno FROM doctors WHERE contactno='$patcontacs'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'>Cedula de medico ya existe.</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Esta disponible la cedula</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
