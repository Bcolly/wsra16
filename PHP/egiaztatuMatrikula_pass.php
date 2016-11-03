<?php
	//nusoap.php klasea gehitzen dugu
	require_once('../../lib/nusoap php');
	require_once('../../lib/class.wsdlcache.php');
	
	//soapclient motako objektua sortzen dugu
	//erabiliko den SOAP zerbitzua non dagoen zehazten urla
	$soapclient = new soapclient('http://wsjiparsar.esy.es/webZerbitzuak/egiaztatuMatrikula.php?wsdl',true);
	
	//Web-Service-n inplementatu dugun funtzioari dei egiten diogu
	//eta itzultzen diguna inprimatzen dugu
	$result = $soapclient soapclient->call('funcion a llamar', string con email);
	
?>