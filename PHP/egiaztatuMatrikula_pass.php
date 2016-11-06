<?php
	//nusoap.php klasea gehitzen dugu
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');
	
	//soapclient motako objektua sortzen dugu
	//erabiliko den SOAP zerbitzua non dagoen zehazten urla
	$soapclient1 = new nusoap_client('http://wsjiparsar.esy.es/webZerbitzuak/egiaztatuMatrikula.php?wsdl',false);
	$soapclient2 = new nusoap_client('http://oibeas16.esy.es/PHP/passEgiaztatu.php?wsdl',false);
	
	//Web-Service-n inplementatu dugun funtzioari dei egiten diogu
	//eta itzultzen diguna inprimatzen dugu
	$result1 = $soapclient1->call('egiaztatuE', array('eposta' => $_POST['maila']));
	$result2 = $soapclient2->call('egiaztatuP', array('pasahitza' => $_POST['pass']));
	
	echo $result1;
	echo $result2;
	if($result1=='BAI' && $result2=='BALIOZKOA') {
		header("Location: ./enroll_withImage.php");
			exit;
	}
?>