<?php
session_start();
//error_reporting(0);
include("include/config.php");
// Code for updating Password
if(isset($_POST['change']))
{
$PatientContno=$_SESSION['PatientContno'];
$PatientEmail=$_SESSION['PatientEmail'];
$newpassword=md5($_POST['password']);
$query=mysqli_query($con,"update tblpatient set password='$newpassword' where PatientContno='$PatientContno' and PatientEmail='$PatientEmail'");
if ($query) {
echo "<script>alert('Contraseña actualizada con éxito.');</script>";
echo "<script>window.location.href ='user-login.php'</script>";
}

}


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Perdida de Contraseña</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />

				
	</head>
	<body class="login">
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a ><h2> HW | Recuperación de contraseña del paciente</h2></a>
				</div>

				<div class="box-login">
					<form class="form-login" name="passwordreset" method="post" onSubmit="return valid();">
						<fieldset>
							<legend>
								Recuperación de contraseña del paciente
							</legend>
								<img width="200" height="200" src="ico/login.png">
							<p>
								Ingrese su correo electrónico y contraseña para recuperar su contraseña..<br />
								<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
							</p>

<div class="form-group">
<span class="input-icon">
<input type="password" class="form-control" id="password" name="password" placeholder="contraseña" required>
<i class="fa fa-lock"></i> </span>
</div>
	


							<div class="form-actions">
								
								<button type="submit" class="btn btn-primary pull-right" name="change">
									Cambio <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
							<div class="new-account">
								¿Ya tienes una cuenta? 
								<a href="user-login.php">
									Iniciar sesión
								</a>
							</div>
						</fieldset>
					</form>

					<div class="copyright">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> HW</span>. <span></span>
					</div>
			
				</div>

			</div>
		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
	
		<script src="assets/js/main.js"></script>

		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
	
	</body>
	<!-- end: BODY -->
</html>