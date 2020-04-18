<?php
require_once("conexion.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="description" content="Prueba Jorvge Olaya">   
		<title>Prueba de Jorge Olaya</title> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>	
		<link href="https://fonts.googleapis.com/css2?family=Baloo+Paaji+2:wght@500&display=swap" rel="stylesheet">
	</head>
	<body>
		<div class="container" style = "font-family: 'Baloo Paaji 2' ; cursive;">
		<div class="col-md-12 offset-md-5 p-5 bg-light text-center" style = "font-family: 'Baloo Paaji 2' ; cursive;">
        <h5 class="text-secondary"> REPORTE ARCHIVOS </h5>
        <div class="table-responsive">
		<table class="table table-striped table-bordered">
        
		<tr><td colspan = '3' ><a href = 'extraer_datos.php'>Retornar</a></td></tr>         
        
		<tr>
		<th class="text-secondary" style="text-align:center;">Id archivo</th>
		<th class="text-secondary" style="text-align:center;" >Nombre archivo</th>
		<th class="text-secondary" style="text-align:center;">Extension</th>
		</tr>
        
		       
		
		<?php
		
		
		$sConsulat_para = "SELECT archivos.id_archivo AS uno , extensiones.extension AS dos , archivos.nombre AS tres  FROM archivos  , extensiones  WHERE archivos.id_archivo = extensiones.id_archivo ";
		$resultado = $mysqli->query($sConsulat_para);
		while ($sSalida = $resultado->fetch_assoc()) 
		{
			$sID_Archivo = $sSalida['uno'];
			$sExtension = $sSalida['dos'];
			$sNombre = $sSalida['tres'];		
			?>
            <tr>
            <td><?php  echo $sID_Archivo ?> </td>
            <td><?php  echo $sNombre ?> </td>
           	<td><?php  echo $sExtension ?> </td>
            
            <?php
			
		}		
		
		?>	
		
        <tr><td colspan = '3' ><a href = 'extraer_datos.php'>Retornar</a></td></tr>
		</table>
		</div>        
    	<hr>
   		</div>
		</div>
	</body>
</html>