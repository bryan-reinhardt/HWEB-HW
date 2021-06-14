<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
  {

    $vid=$_GET['viewid'];
    $bp=$_POST['bp'];
    $bs=$_POST['bs'];
    $weight=$_POST['weight'];
    $temp=$_POST['temp'];
   $pres=$_POST['pres'];
        $Medico=$_POST['Medico'];
              $estado=$_POST['estado'];
              $contactno=$_POST['contactno'];
           
    
 
      $query.=mysqli_query($con, "insert   tblmedicalhistory(PatientID,BloodPressure,BloodSugar,Weight,Temperature,MedicalPres,Medico,estado,contactno)value('$vid','$bp','$bs','$weight','$temp','$pres','$Medico','$estado','$contactno')");
    if ($query) {
    echo '<script>alert("Historial medico Añadido con exito")</script>';
    echo "<script>window.location.href ='manage-patient.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>
<?php

if(isset($_GET['del']))
      {
              mysqli_query($con,"delete from tblmedicalhistory where  ID='".$_GET['ID']."'");
                  $_SESSION['msg']="datos eliminados !!!";
   header('location:manage-patient.php');


      }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Doctor | Administar Pacientes</title>
    
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
<h3><strong>DOCTOR | ADMINISTRAR PACIENTES</strong> </h3>  
</div>
<ol class="breadcrumb">
<li>
<span>Doctor</span>
</li>
<li class="active">
<span>Administrar Pacientes</span>
<img width="300" height="250" src="ico/9.jpg">
</li>
</ol>
</div>

</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15">Administrar <span class="text-bold"> Pacientes</span></h5>
<?php
                               $vid=$_GET['viewid'];
                               $ret=mysqli_query($con,"select * from tblpatient where id='$vid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
                               ?>
<table border="1" class="table table-bordered">
 <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 Detalles del paciente</td></tr>

    <tr>
    <th scope>Nombre completo del paciente</th>
    <td><?php  echo $row['PatientName'];?></td>
    <th scope>  Correo del paciente</th>
    <td><?php  echo $row['PatientEmail'];?></td>
  </tr>
  <tr>
    <th scope>Documento de registro</th>
    <td><?php  echo $row['PatientContno'];?></td>
    <th>Cédula</th>
    <td><?php  echo $row['cedula'];?></td>
  </tr>
    <tr>
    <th>Genero</th>
    <td><?php  echo $row['PatientGender'];?></td>
    <th>  Edad del paciente</th>
    <td><?php 
	$birth= new DateTime($row['fnacimiento']);
	$today = new DateTime('today');
	echo $birth->diff($today)->y;
	?></td>
  </tr>
  <tr>
    
    <th>Historial médico del paciente (si lo hay)</th>
    <td><?php  echo $row['PatientMedhis'];?></td>
    <th>Fecha de nacimiento</th>
    <td><?php 
	echo $row['fnacimiento'];
	?></td>
    

  </tr>
  <tr>
    
    <th>Habitación  </th>
    <td><?php  echo $row['habitacion'];?></td>
      <th>Fecha de registro del paciente</th>
    <td><?php  echo $row['CreationDate'];?></td>
   
      
 
  </tr>
 
  
  <tr>
    
    
          <th>Cama</th>
        <td><?php  echo $row['cama'];?> </td>
             <th>Motivo de ingreso</th>

        <td><?php  echo $row['ingreso'];?> </td>
   
   
 
  </tr>
   <tr>  
    <th>Piso  </th>
       <td><?php  echo $row['piso'];?></td>
   
    
         <th>Dirección del paciente </th>
         <td><?php  echo $row['PatientAdd'];?></td>
      
 
  </tr>
 <th>Fecha de salida</th>
       <td><?php  echo $row['fsalida'];?></td>
   
    
         <th> </th>
         <td><?php  echo $row[''];?></td>
      
 
  </tr>
<?php }?>
</table>
<?php  

$ret=mysqli_query($con,"select * from tblmedicalhistory  where PatientID='$vid'");



 ?>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="11" >Historial Médico</th> 
  </tr>
  <tr>
<th>#</th>
<th> Presión arterial</th>
<th> Peso</th>
<th> Tipo de sangre</th>
<th> Temperatura corporal</th>
<th> Prescripción médica </th>
<th> Fecha de visita</th>
<th> Médico </th>
<th>ID medico </th>
<th> Estado del paciente</th>
<th> Accion</th>



</tr>
<?php  

while ($row=mysqli_fetch_array($ret)) { 
  ?>
<tr>
  <td><?php echo $cnt;?></td>

 <td><?php  echo $row['BloodPressure'];?></td>
 <td><?php  echo $row['Weight'];?></td>
 <td><?php  echo $row['BloodSugar'];?></td> 
  <td><?php  echo $row['Temperature'];?></td>
  <td><?php  echo $row['MedicalPres'];?></td>
  <td><?php  echo $row['CreationDate'];?></td> 
   <td><?php  echo $row['Medico'];?>
      <td><?php  echo $row['contactno'];?>
     <td><?php  echo $row['estado'];?>
     
   <td >
                <div class="visible-md visible-lg hidden-sm hidden-xs">
              <a href="edithis.php?ID=<?php echo $row['ID'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>     
                          
  <a href="?ID=<?php echo $row['ID']?>&del=delete" onClick="return confirm('¿Estás seguro de que quieres eliminar?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>

                        </div>
                        <div class="visible-xs visible-sm hidden-md hidden-lg">
                          <div class="btn-group" dropdown is-open="status.isopen">
                            <button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
                              <i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right dropdown-light" role="menu">
                              <li>
                                <a href="#">
                                  Editar
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  Compartir
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  Remover
                                </a>
                              </li>
                            </ul>
                          </div>
                        </div></td>
</tr>

<?php $cnt=$cnt+1;} ?>

</table>

<p align="center">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Agregar Historial Médico</button></p>  

<?php  ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Agregar Historial Médico</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">

                                 <form method="post" name="submit">

   <!--                   ----------------------------------------------------------------                        -->

                               <!-- end: PAGE TITLE -->
                        <!-- start: BASIC EXAMPLE -->
                        <?php $sql=mysqli_query($con,"select * from doctors where docEmail='".$_SESSION['dlogin']."'");
while($data=mysqli_fetch_array($sql))
{
?>

 

<?php {?>

 

<?php } ?>

 

                                                    
<?php $ret=mysqli_query($con,"select * from doctorspecilization");
while($row=mysqli_fetch_array($ret))
{
?>
<?php } ?>
                                                            

 

<tr>
    <th>Médico: </th>
    <td>
    <input name="Medico" placeholder="Médico" readonly="readonly" class="form-control wd-450" required="required" value="<?php echo htmlentities($data['doctorName']);?>"></td>
  </tr>  
  <th>Cédula: </th>
    <td>
    <input name="contactno" readonly="readonly" placeholder="Cedula" class="form-control wd-450" required="true" value="<?php echo htmlentities($data['contactno']);?>"></td>
  </tr>                              
  <?php } ?>

 

  <tr>
    <th>Estado del paciente: </th>
    <td>
    <input name="estado" placeholder="estado" class="form-control wd-450" required="true"></td>
  </tr> 
      <tr>
    <th>Presión Arterial: </th>
    <td>
    <input name="bp" placeholder="Presión Arterial" class="form-control wd-450" required="true"></td>
  </tr>                          
     <tr>
    <th>Tipo de sangre: </th>
    <td>
    <input name="bs" placeholder="Tipo de sangre" class="form-control wd-450" required="true"></td>
  </tr> 
  <tr>
    <th>Peso:</th>
    <td>
    <input name="weight" placeholder="Peso" class="form-control wd-450" required="true"></td>
  </tr>
  <tr>
    <th>Temperatura Corporal:</th>
    <td>
    <input name="temp" placeholder="Temperatura Corporal" class="form-control wd-450" required="true"></td>
  </tr>

 

  
                         
     <tr>
    <th>
diagnóstico:</th>
    <td>
    <textarea name="pres" placeholder="
diagnóstico" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr>  
   
</table>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
 <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
  
  </form>
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
