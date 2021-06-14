<?php 
	require_once('conexion/conexion.php');	
	$usuario = 'SELECT * FROM tblpatient ORDER BY id DESC';	
	$tblpatient=$mysqli->query($usuario);
	
if(isset($_POST['create_pdf'])){
	require_once('tcpdf/tcpdf.php');
	
	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
	
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Administrador');
	$pdf->SetTitle($_POST['reporte_name']);
	
	$pdf->setPrintHeader(false); 
	$pdf->setPrintFooter(false);
	$pdf->SetMargins(20, 20, 20, false); 
	$pdf->SetAutoPageBreak(true, 20); 
	$pdf->SetFont('Helvetica', '', 10);
	$pdf->addPage();

	$content = '';
	
	$content .= '
		<div class="row">
        	<div class="col-md-12">
            	<h1 style="text-align:center;">'.$_POST['reporte_name'].'</h1>
       	
      <table border="1" cellpadding="5">
        <thead>
          <tr>
            <th>Numero de Documento</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>edad</th>
            <th>Dirrecion</th>
            <th>Historial meidico</th>
          </tr>
        </thead>
	';
	
	while ($user=$tblpatient->fetch_assoc()) { 
     
  $content .= '
  
            <td>'.$user['Docid'].'</td>
            <td>'.$user['PatientName'].'</td>
            <td>'.$user['PatientEmail'].'</td>
            <td>'.$user['PatientAge'].'</td>
            <td>'.$user['PatientAdd'].'</td>
            <td>S/. '.$user['PatientMedhis'].'</td>
        </tr>
  ';
  }
	
	
	$content .= '</table>';
	
	$content .= '
		<div class="row padding">
        	<div class="col-md-12" style="text-align:center;">
            	<span>Pdf Creator </span><a href="http://www.redecodifica.com">By Miguel Angel</a>
            </div>
        </div>
    	
	';
	
	$pdf->writeHTML($content, true, 0, true, 0);

	$pdf->lastPage();
	$pdf->output('Reporte.pdf', 'I');
}

?>
		 
          
        
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>PDF</title>
<meta name="keywords" content="">
<meta name="description" content="">
<!-- Meta Mobil
================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</head>

<body>
	<div class="container-fluid">
        <div class="row padding">
        	<div class="col-md-12">
            	<?php $h1 = "Reporte de Pacientes";  
            	 echo '<h1>'.$h1.'</h1>'
				?>
            </div>
        </div>
    	<div class="row">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Documento</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Edad</th>
            <th>Dirrecion</th>
            <th>Historial medico</th>
          </tr>
        </thead>
        <tbody>
        <?php 
			while ($user=$tblpatient->fetch_assoc()) {   ?>
          <tr class="<?php if($user['activo']=='A'){ echo 'active';}else{ echo 'danger';} ?>">
            <td><?php echo $user['PatientContno']; ?></td>
            <td><?php echo $user['PatientName']; ?></td>
            <td><?php echo $user['PatientEmail']; ?></td>
            <td><?php echo $user['PatientAge']; ?></td>
            <td><?php echo $user['PatientAdd']; ?></td>
            <td><?php echo $user['PatientMedhis']; ?></td>
          </tr>
         <?php } ?>
        </tbody>
      </table>
              <div class="col-md-12">
              	<form method="post">
                	<input type="hidden" name="reporte_name" value="<?php echo $h1; ?>">
                	<input type="submit" name="create_pdf" class="btn btn-danger pull-right" value="Generar PDF">
                </form>
              </div>
      	</div>
    </div>
</body>
</html>