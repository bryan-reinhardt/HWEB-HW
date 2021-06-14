<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
date_default_timezone_set('America/Costa_Rica');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['submit']))
{
$PatientName=$_POST['PatientName'];
$PatientContno=$_POST['PatientContno'];

$cedula=$_POST['cedula'];
$fnacimiento=$_POST['fnacimiento'];
	
$PatientGender=$_POST['PatientGender'];
$PatientEmail=$_POST['PatientEmail'];



$sql=mysqli_query($con,"Update tblpatient set PatientName='$PatientName',PatientContno='$PatientContno',cedula='$cedula',fnacimiento='$fnacimiento',PatientGender='$PatientGender',PatientEmail='$PatientEmail' where id='".$_SESSION['id']."'");
if($sql)
{
$msg="
perfil actualizado con éxito";


}

}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Paciente | Editar Perfil</title>
		
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
									<h1 class="mainTitle"><h3><strong>Paciente | Editar perfil</strong> </h3>	</h1>
																	</div>
																	
								<ol class="breadcrumb">
									<img width="180" height="180" src="ico/prueba.png">

								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
<h5 style="color: green; font-size:18px; ">
<?php if($msg) { echo htmlentities($msg);}?> </h5>
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Editar Perfil</h5>
												</div>
												<div class="panel-body">
									<?php 
$sql=mysqli_query($con,"select * from tblpatient where id='".$_SESSION['id']."'");
while($data=mysqli_fetch_array($sql))
{
?>


<h4>Perfil de: <?php echo htmlentities($data['PatientName']);?></h4>
<p><b>Fecha de Creación: </b><?php echo htmlentities($data['regDate']);?></p>
<?php if($data['updationDate']){?>
<p><b>Ultima Actualización del Perfil: </b><?php echo htmlentities($data['updationDate']);?></p>
<?php } ?>
<hr />													<form role="form" name="edit" method="post">
													

<div class="form-group">
															<label for="PatientName">
																Nombre completo del paciente
															</label>
	<input type="text" name="PatientName" class="form-control" value="<?php echo htmlentities($data['PatientName']);?>" >
														</div>
                                                             

<div class="form-group">
															<label for="PatientAdd">
																Dirreción															</label>
					<textarea name="PatientAdd" class="form-control"><?php echo htmlentities($data['PatientAdd']);?></textarea>
														</div>
<div class="form-group">
															<label for="PatientContno">
															Número de documento
															</label>
		<input type="text" name="PatientContno" class="form-control"  readonly="readonly"  required="required"  value="<?php echo htmlentities($data['PatientContno']);?>" >
														</div>
	
<div class="form-group">                                        Género
									<label for="PatientGender">
																
															</label>

<select name="PatientGender" readonly="readonly" class="form-control" required="required" >
<option value="<?php echo htmlentities($data['PatientGender']);?>"><?php echo htmlentities($data['PatientGender']);?></option>

</select>

														</div>

														<div class="form-group">
															<label for="cedula">
															Cédula
															</label>
		<input type="text" name="cedula" readonly="readonly"  class="form-control"  readonly="readonly"  required="required"  value="<?php echo htmlentities($data['cedula']);?>" >
														</div>
														

														

														

														<div class="form-group">
															<label for="fnacimiento">
															Fecha de nacimiento
															</label>
		<input type="date" name="fnacimiento"   class="form-control"  required="required"  value="<?php echo htmlentities($data['fnacimiento']);?>" >
														</div>

<div class="form-group">
									<label for="fess">
																 Email del paciente
															</label>
					<input type="email" name="PatientEmail" class="form-control"  readonly="readonly"  value="<?php echo htmlentities($data['PatientEmail']);?>">
					<a href="change-emaild.php">Actualizar correo electrónico</a>
														</div>



														
														
														
														
														<button type="submit" name="submit" class="btn btn-o btn-primary">
														Actualizar
														</button>
													</form>
													<?php } ?>
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
						
						<!-- end: BASIC EXAMPLE -->
			
					
					
						
						
					
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->

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
