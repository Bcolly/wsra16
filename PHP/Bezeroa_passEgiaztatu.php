<?php
	//nusoap.php klasea gehitzen dugu
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');
	
	//soapclient motako objektua sortzen dugu
	//erabiliko den SOAP zerbitzua non dagoen zehazten urla
	$soapclient = new nusoap_client('http://oibeas16.esy.es/PHP/Zerbitzua_passEgiaztatu.php?wsdl',true);
	//$soapclient = new nusoap_client('http://localhost/wsra16/PHP/Zerbitzua_passEgiaztatu.php?wsdl',true);
	
	//Web-Service-n inplementatu dugun funtzioari dei egiten diogu
	//eta itzultzen diguna inprimatzen dugu
	$result = $soapclient->call('egiaztatuP', array('x' => $_GET['pass']));
	
	echo $result;
	
?>