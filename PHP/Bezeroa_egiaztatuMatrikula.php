<?php
	//nusoap.php klasea gehitzen dugu
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');
	
	//soapclient motako objektua sortzen dugu
	//erabiliko den SOAP zerbitzua non dagoen zehazten urla
	$soapclient = new nusoap_client('http://wsjiparsar.esy.es/webZerbitzuak/egiaztatuMatrikula.php?wsdl',false);
	
	//Web-Service-n inplementatu dugun funtzioari dei egiten diogu
	//eta itzultzen diguna inprimatzen dugu
	$result = $soapclient->call('egiaztatuE', array('eposta' => $_GET['maila']));
	
	echo $result;
?>