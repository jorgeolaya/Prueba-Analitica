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
		<div class="col-md-10 offset-md-5 p-5 bg-light text-center" style = "font-family: 'Baloo Paaji 2' ; cursive;">
        <h5 class="text-secondary"> REPORTE ESTENSION </h5>
        <div class="table-responsive">
		<table class="table table-striped table-bordered">
		<tr><td colspan = '3' ><a href = 'extraer_datos.php'>Retornar</a></td></tr>         
		<tr>
		<th class="text-ablesecondary" style="text-align:center;">Extension</th>
		<th class="text-secondary" style="text-align:center;">Cantidad</th>
			
		</tr>
		
		<?php
		
		
		
		$sConsulat_para = "SELECT extension , COUNT(extension) AS cantidad 	FROM  extensiones  GROUP BY extension";
		$resultado = $mysqli->query($sConsulat_para);
		while ($sSalida = $resultado->fetch_assoc()) 
		{
			$sExtension = NULL;
			$sCantidad = NULL,

			$sExtension = $sSalida['extension'];
			$sCantidad = $sSalida['cantidad'];
			
			if (is_null ($sExtension) or empty ($sExtension)) $sExtension = "DESCONOCIDO";
			?>
            <tr>
            <td><?php  echo $sExtension ?> </td>
            <td><?php  echo $sCantidad ?> </td>
            
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