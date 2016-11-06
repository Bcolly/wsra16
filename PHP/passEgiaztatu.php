<?php
	//nusoap.php klasea gehitzen dugu
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');
	
	//soap_server motako objektua sortzen dugu
	$ns="../XML/passEgiaztatu.xml"
	$server = new soap_server;
	$server->configureWSDL('egiaztatuP',$ns);
	$server->wsdl->schemaTargetNamespace=$ns;
	
	//inplementatu nahi dugun funtzioa erregistratzen dugu
	$server->register('egiaztatuP',
		array('pass'=>'xsd:string'),
		array('ans'=>'xsd:string'),$ns);
	
	
	//funtzioa inplementatzen dugu
	function egiaztatuP($pass){
		$erantzuna = 'BALIOZKOA';
		$ondo = true;
		$fitx = fopen("../toppasswords.txt", "r") or die("Ezin izan da fitxategia zabaldu");
		while ((($line=fgets($fitx))!==false) || $ondo) {
			if ($line==$pass){
				$ondo=false;
				$erantzuna = 'BALIOGABEA';
			}
		}
		fclose($fitx);
		return $erantzuna;
	}
	
	//nusoap klaseko sevice metodoari dei egiten diogu
	$HTTP_RAW_POST_DATA = isset($$HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$server->service($HTTP_RAW_POST_DATA);
?>