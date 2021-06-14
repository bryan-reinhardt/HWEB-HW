<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{	
$habitacion=$_POST['habitacion'];
$piso=$_POST['piso'];
$cama=$_POST['cama'];
$sql=mysqli_query($con,"insert into habitacion(habitacion,piso,cama) values('$habitacion','$piso','$cama')");
if($sql)
{
echo "<script>alert('Añadido con existo');</script>";
header('location:HB.php');

}
}
?>



<script>
function checkemailAvailability2() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availabilityh.php",
data:'patcontact='+$("#cama").val(),
type: "POST",
success:function(data){
$("#document-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>




<script>
function checkemailAvailability5() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availabilityh.php",
data:'patconta='+$("#habitacion").val(),
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
function checkemailAvailability6() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availabilityh.php",
data:'patcont='+$("#piso").val(),
type: "POST",
success:function(data){
$("#documenttt-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>




<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Agregar Habitación</title>
	
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
					
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
								<h3><strong>ADMINISTRADOR | AGREGAR HABITACIÓN</strong> </h3>	
																	</div>
								<ol class="breadcrumb">
									<li>
										<img width="350" height="250" src="assets/images/17.jpg" >
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-6 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Habitación (Siga el orden espesifico para agregar los datos)</h5>
												</div>
												<div class="panel-body">
								<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>	
													<form role="form" name="habitacion" method="post" >
														<div class="form-group">
															<label for="exampleInputEmail1">
															Agregar Habitación
															</label>
							<input type="text" id="habitacion" name="habitacion" class="form-control"  placeholder="(H#) " onBlur="checkemailAvailability5()">
							<span id="documentt-availability-status"></span>
														</div>

																				<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>	
													<form role="form" name="piso" method="post" >
														<div class="form-group">
															<label for="exampleInputEmail1">
															Agregar Piso
															</label>
							<input type="text" id="piso"name="piso" class="form-control"  placeholder="(P#)"  onBlur="checkemailAvailability6()">
							<span id="documenttt-availability-status"></span>
														</div>


													<div class="form-group">
									<label for="fess">
																cama
															</label>
<input type="text" id="cama" name="cama" class="form-control"  placeholder="(C#)-(H#)-(P#)" onBlur="checkemailAvailability2()">
<span id="document-availability-status"></span>
</div>

														
														
														
														<button type="submit" name="submit" class="btn btn-o btn-primary">
														Enviar
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
