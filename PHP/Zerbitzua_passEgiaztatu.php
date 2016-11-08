<?php
	//nusoap.php klasea gehitzen dugu
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');
	
	//soap_server motako objektua sortzen dugu
	$ns="http://localhost/wsra16/PHP/Zerbitzua_passEgiaztatu.php?wsdl";
	$server = new soap_server;
	$server->configureWSDL('egiaztatuP',$ns);
	$server->wsdl->schemaTargetNamespace=$ns;
	
	//inplementatu nahi dugun funtzioa erregistratzen dugu
	$server->register('egiaztatuP',
		array('x'=>'xsd:string'),
		array('y'=>'xsd:string'),
		$ns);
	
	
	//funtzioa inplementatzen dugu
	function egiaztatuP($pass){
		$fitx = fopen("../toppasswords.txt", "r") or die("Ezin izan da fitxategia zabaldu");
		while (!feof($fitx)) {
			$line = fgets($fitx);
			$line = str_replace("\n", "", $line);
			$line = str_replace("\r", "", $line);
			if($line === $pass){
				return "BALIOGABEA";
			}
		}
		fclose($fitx);
		return "BALIOZKOA";
	}
	
	//nusoap klaseko sevice metodoari dei egiten diogu
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$server->service($HTTP_RAW_POST_DATA);
?>