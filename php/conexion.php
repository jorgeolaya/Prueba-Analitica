<?php


error_reporting(0); //  para que no se visualice ningun error en la aplicacion
$login = "jorgeolaya_jorge";
$pass = "norma2000";
$BD = "jorgeolaya_prueba";
$mysqli = new mysqli('localhost', $login,$pass , $BD);
if ($mysqli -> connect_errno) {
die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
. ") " . $mysqli -> mysqli_connect_error());
}

class Consultas_LosdatosClass
{
	
	public $fechainicial;
	public $archivo;  
	public $nombre;  	
   
	
	private static $sParametros = array('encoding' => 'UTF-8');
	private static $sSoapParametros = array('Condiciones'
	=>array('Condicion'
	=>array('Tipo'=>'FechaInicial',
	'Expresion'=>'2019-07-01 00:00:00')) 
	);	

	public function losDatos()
	{
		try 
		{
			$oClienteObjeto=new SoapClient(SOAP_WSDL_SOURCE,self::$sParametros);
			$oClienteObjeto->__setLocation(SOAP_SERVICE_LOCATION);
			return($oClienteObjeto->BuscarArchivo(self::$sSoapParametros));
			return ($oClienteObjeto->__getTypes()); 
		}
		catch(SoapFault $err)
		{
			return($err);
		}
			
	}

}

?>