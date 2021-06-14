<?php
	session_start();
	error_reporting(0);
	include('include/config.php');
	include('include/checklogin.php');
	check_login();

	if(isset($_POST['submit']))
		{	
			$docid=$_SESSION['id'];
			$patname=$_POST['patname'];
		$PatientContno=$_POST['PatientContno'];
			$cedula=$_POST['cedula'];
		$patemail=$_POST['patemail'];
		$gender=$_POST['gender'];
		$pataddress=$_POST['pataddress'];
	;
		$fnacimiento=$_POST['fnacimiento'];
		$medhis=$_POST['medhis'];
		$password=md5($_POST['password']);
        
		$habitacion=$_POST['habitacion'];
		$piso=$_POST['piso'];
		$cama=$_POST['cama'];
				$ingreso=$_POST['ingreso'];
		$sql=mysqli_query($con,"insert into tblpatient(Docid,PatientName,PatientContno,cedula,PatientEmail,PatientGender,PatientAdd,fnacimiento,PatientMedhis,password,habitacion,piso,cama,ingreso) values('$docid','$patname','$PatientContno','$cedula','$patemail','$gender','$pataddress','$fnacimiento','$medhis','$password','$habitacion','$piso','$cama','$ingreso')");
		if($sql)
{
	echo "<script>alert('Registrado exitosamente.');</script>";
	header('location:manage-patient.php');

		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>adm| Agregar Paciente</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		<script type="text/javascript">
		</script>

		<script type="text/javascript">
function valid()
{
 if(document.registration.password.value!= document.registration.password_again.value)
{
alert("Contraseña no coinciden !!");
document.registration.password_again.focus();
return false;
}
return true;
}
</script>
		

	
<script>
function checkemailAvailability22() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailic='+$("#cedula").val(),
type: "POST",
success:function(data){
$("#emailc-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>	


<script>
function checkemailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availabilityp.php",
data:'emailid='+$("#PatientEmail").val(),
type: "POST",
success:function(data){
$("#email-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>


<script>
function checkemailAvailability4() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availabilityh.php",
data:'patcontac='+$("#cama").val(),
type: "POST",
success:function(data){
$("#documentt-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>




<script>
function checkemailAvailability2() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availabilityc.php",
data:'patcontact='+$("#PatientContno").val(),
type: "POST",
success:function(data){
$("#document-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

</head>


<body>

<div id="app">		
	<?php include('include/sidebar.php');?>

	<div class="app-content">

	<?php include('include/header.php');?>
						

	<div class="main-content" >
	<div class="wrap-content container" id="container">


	<!-- start: PAGE TITLE -->

	<section id="page-title">

	<div class="row">
	<div class="col-sm-8">
				<h3><strong>Administrador | Agregar paciente</strong> </h3>	
	</div>

	<ol class="breadcrumb">
	
	</ol>

	</div>

</section>

	<div class="container-fluid container-fullw bg-white">
	<div class="row">

					<div class="copyright">
						 <span class=""><strong>	Ver Docuemtos registrados de pacientes</strong></span><span class=""> 
						</span>. <span></span>
						<i class="fa fa-lock"></i>
									 </span>
									 <a href="listaDoc.php">
									ir a lista
								</a>
					</div>

	<div class="col-md-12">
	<div class="row margin-top-30">
	<div class="col-lg-8 col-md-12">
	<div class="panel panel-white">
	<div class="panel-heading">
	<h5 class="panel-title">Agregar Paciente</h5>
	</div>
	
	<div class="panel-body">

	<form role="form" name="" method="post">

	<div class="form-group">
	<label for="doctorname">

		Nombre completo del paciente
	</label>
		<input type="text" id="patname" name="patname" class="form-control"  placeholder="Nombre" required="true">

	</div>
	<div class="form-group">
									<label for="fess">
																Número de documento del Paciente
															</label>
<input type="number" id="PatientContno" name="PatientContno" class="form-control"  placeholder="Documento" required="true" onBlur="checkemailAvailability2()">
<span id="document-availability-status"></span>
</div>

<div class="form-group">
									<label for="fess">
																Número de cédula del paciente
															</label>
<input type="number" id="cedula" name="cedula" class="form-control"  placeholder="Cédula" required="true" onBlur="checkemailAvailability22()">
<span id="emailc-availability-status"></span>
</div>






	
<div class="form-group">
									<label for="fess">
																Correo del paciente
															</label>
<input type="email" id="PatientEmail" name="patemail" class="form-control"  placeholder="Correo" required="true" onBlur="checkemailAvailability()">
<span id="email-availability-status"></span>
</div>

						

<div class="form-group">
<label class="block">
	Género


</label>
		<div class="clip-radio radio-primary">
		<input type="radio" id="rg-female" name="gender" value="mujer" >
		<label for="rg-female">	
	Mujer 
		</label>
		<input type="radio" id="rg-male" name="gender" value="hombre">
		<label for="rg-male">
	hombre </label>
		</div>
		</div>

		<div class="form-group">
		<label for="address">
	Dirección del Procedencia
</label>
<textarea name="pataddress" class="form-control"  placeholder="Ingrese la dirección del paciente" required="true"></textarea>
</div>
<div class="form-group">
		<label for="address">
Motivo de ingreso
</label>
<textarea name="ingreso" class="form-control"  placeholder="moitvo de ingreso" required="true"></textarea>
</div>



<div class="form-group">
<label for="fnacimiento">
Fecha de nacimiento
</label>
	<input type="date" name="fnacimiento" step="1" min="1800-01-01" max="2037-12-31" value="2020-01-01" class="form-control"  required="true">


</div>





<div class="form-group">
<label for="fess">
Historial médico
</label>
<textarea type="text" name="medhis" class="form-control"  placeholder="Ingrese el historial médico del paciente (si corresponde)" required="true"></textarea>
</div>
<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							


														<div class="form-group">
															<label for="habitacion">
																Habitación
															</label>
							<select name="habitacion" class="form-control" required="true">
																<option value="">Seleccionar Habitación</option>
<?php $ret=mysqli_query($con,"select DISTINCT habitacion from habitacion ");
while($row=mysqli_fetch_array($ret))
{
?>
																<option value="<?php echo htmlentities($row['habitacion']);?>">
																	<?php echo htmlentities($row['habitacion']);?>
																</option>
																<?php } ?>
																
															</select>
														</div>


														<div class="form-group">
															<label for="habitacion">
															Piso
															</label>

	<select name="piso" class="form-control" required="true">
																<option value="">Seleccionar Piso</option>
<?php $ret=mysqli_query($con,"select DISTINCT piso from habitacion");
while($row=mysqli_fetch_array($ret))
{
?>
																<option value="<?php echo htmlentities($row['piso']);?>">
																	<?php echo htmlentities($row['piso']);?>
																</option>
																<?php } ?>
																
															</select>
														</div>


														<div class="form-group">
															<label for="habitacion">
																Cama
															</label>

															<select  id="cama" name="cama" class="form-control" onBlur="checkemailAvailability4()" required="true">
																
																<option value="">Seleccionar Cama</option>
<?php $ret=mysqli_query($con,"select DISTINCT cama from habitacion");
while($row=mysqli_fetch_array($ret))
{
?>
																<option value="<?php echo htmlentities($row['cama']);?>">
																	<?php echo htmlentities($row['cama']);?>
																</option>
																<?php } ?>

																
															</select>
															
																<span id="documentt-availability-status"></span>
															</span>
														</div>


<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
Agregar
</button>
</form>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="panel panel-white">
</div>
</div>
</div>
</div>
</div>
</div>				
</div>
</div>
</div>
			<!-- start: FOOTER -->
<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
