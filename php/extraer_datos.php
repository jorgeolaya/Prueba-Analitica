<?php

if ($_POST['reporte2'] == 'Reporte 2'  ) 
{
	header("Location: reporteextension.php");
}


if ($_POST['reporte1'] == 'Reporte 1'  ) 
{
	header("Location: reportearchivo.php");
}

require_once("conexion.php");



define("SOAP_WSDL_SOURCE",'http://test.analitica.com.co/AZDigital_Pruebas/WebServices/ServiciosAZDigital.wsdl');
define("SOAP_SERVICE_LOCATION",'http://test.analitica.com.co/AZDigital_Pruebas/WebServices/SOAP/index.php');




if ($_POST['cargar'] == 'Cargar'  ) 
{
	
	$sBorrar1 = "DELETE FROM archivos ";
	
	$sBorrar2 = "DELETE FROM extensiones ";
	$mysqli->query($sBorrar1);
	$mysqli->query($sBorrar2);
	

	$oConSalida=new Consultas_LosdatosClass();

	$sArchivos_salida = (array)json_decode(json_encode($oConSalida->losDatos()), true); // Parseo de la informacion proveniente del servicio
	
	
	$iContador = 0;

	$aID = array ();
	$aNombreCompleto_archivo = array () ;
	
	foreach ($sArchivos_salida['Archivo'] as $key => $archivo)
	{
		
		$aID[$iContador] = NULL;
		$aNombreCompleto_archivo[$iContador] = NULL;
		
		foreach ($archivo as $key2 => $archivo2)
		{
			if ($key2 == 'Id') $TTT = $aID[$iContador] =  $archivo2  ;
			
			if (!is_null ($aID[$iContador]) and !empty ($aID[$iContador]))
			{
				if ($key2 == 'Nombre') 
				{
					$aNombreCompleto_archivo[$iContador] =  $archivo2;
					$iContador ++;
					
					$aID[$iContador] = NULL;
					$aNombreCompleto_archivo[$iContador] = NULL;
					
				}
			}
			else
			{
				if ($key2 == 'Id') $aID[$iContador] =  $archivo2  ;
			}
		}
		 
	}

	for ($ii=0;$ii<=$iContador ; $ii ++)
	{
		if (!is_null ($aID[$ii]) and !empty ($aID[$ii]))
		{
			$sNOmbre_ar = NULL;
			$sEl_id = NULL ;
			$tipoArchivo  = NULL ;
			
			$sNOmbre_ar = $aNombreCompleto_archivo[$ii];			
			
			list ($nombrPrceParcial , $ext ) =  explode ("." , $sNOmbre_ar );
			
			$nombrPrceParcial_t = (string) $nombrPrceParcial;
			$nombrPrceParcial = trim ($nombrPrceParcial_t);
			
			$ext_t = (string) $ext;
			$ext = trim ($ext_t);
			

			$sEl_id =  $aID[$ii]  ;
			
		
            switch($ext) {
                case "pdf":
                    $tipoArchivo = "Portable Document Format";
                    break;
                case "xml":
                    $tipoArchivo = "eXtensible Markup Language";
                    break;
                case "html":
                    $tipoArchivo = "Hypertext Markup Language";
                    break;
                case "css":
                    $tipoArchivo = "Cascading Style Sheets";
                    break;
                case "js":
                    $tipoArchivo = "Documento Javascript";
                    break;
                case "png":
                    $tipoArchivo = "Portable Network Graphics";
                    break;
                case "jpg":
                    $tipoArchivo = "Joint Photographic Experts Group";
                    break;
                case "mp4":
                    $tipoArchivo = "archivo comprimido MPEG4";
                    break;
                case "mpeg":
                    $tipoArchivo = "Moving Picture Experts Group";
                    break;
                case "mp3":
                    $tipoArchivo = "MPEG-1 Audio Layer III o MPEG-2 Audio Layer III";
                    break;
                case "p12":
                    $tipoArchivo = "copia de seguridad con clave privada de un certificado";
                    break;
                case "txt":
                    $tipoArchivo = "Archivo de texto plano";
                    break;
                case "docx":
                    $tipoArchivo = "Documento de Word";
                    break;
               case "wsdl":
                    $tipoArchivo = "Web Services Description Language";
                    break;
                default:
                    $tipoArchivo = "DESCONOCIDO";
			}
			
			$sInsertar1 = "INSERT INTO archivos (nombre , id_archivo) VALUES ('$sNOmbre_ar' , '$sEl_id')  ";
			
			$sInsertar2 = "INSERT INTO  extensiones ( extension , id_archivo , tipo_archivo ) VALUES ('$ext' , '$sEl_id' , '$tipoArchivo')";		
			$mysqli->query($sInsertar1);
			$mysqli->query($sInsertar2);
			
		}
		
	}
			
	?>
    <script >
		alert ("DATOS CARGADOS ..");
	</script>
    <?php
				
}


?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="description" content="Prueba Jorvge Olaya">   
		<title>Prueba de Jorge Olaya</title>
		<script  type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script  type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<link href="https://fonts.googleapis.com/css2?family=Baloo+Paaji+2:wght@500&display=swap" rel="stylesheet">
		<style>
        	.centrado{
			  margin-left: auto;
			  margin-right: auto;
			}
			body{
    			background-color: #f2f2f2;
			}			
        </style>        
   </head>
   <body>
		<header>
        <br /><br />
        
		<div  style= "font-size : large ;  font-family: 'Baloo Paaji 2' ; cursive; text-align: center ;">DATOS WEBSERVICE ANALITICA</div>
        
        </header>
	   	<main>
        
   	   <section>
       <br /><br />
       <div  style=" font-size : medium ; font-family: 'Baloo Paaji 2' ; text-align: center;">
        
       <form name = 'forulario' action ='extraer_datos.php' method="post" align = "center">
       <input  style='width:120px; height:25px' type = "submit" name = 'cargar'  value = 'Cargar'  /><br  />
		<input style='width:120px; height:25px' type = "submit" name = 'reporte1'  value = 'Reporte 1'  /><br  />
		<input  style='width:120px; height:25px' type = "submit" name = 'reporte2'  value = 'Reporte 2'  /><br  />       
       
       </form>
       </div>
   	   </section>
       
   	</main>
   	<footer>
    <br /><br /><br >
    <div  style="font-size : medium ; font-family: 'Baloo Paaji 2' ; text-align: center;">
     © Jorge Olaya 
     </div>
     </footer>
   </body>

<?php
mysql_close($mysqli);
?>
</html>