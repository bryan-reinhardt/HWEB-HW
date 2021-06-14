<?php
include('include/config.php');
if(!empty($_POST["specilizationid"])) 
{

 $sql=mysqli_query($con,"select doctorName,id from doctors where specilization='".$_POST['specilizationid']."'");?>
 <option selected="selected">Seleccionar Doctor </option>
 <?php
 while($row=mysqli_fetch_array($sql))
 	{?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['doctorName']); ?></option>
  <?php
}
}


if(!empty($_POST["pat"])) 
{

 $sql=mysqli_query($con,"select PatientName from tblpatinet where id='".$_POST['pat']."'");
 while($row=mysqli_fetch_array($sql))
 	{?>
 <option value="<?php echo htmlentities($row['PatientName']); ?>"><?php echo htmlentities($row['PatientName']); ?></option>
  <?php
}
}

?>

