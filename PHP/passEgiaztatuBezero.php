<?php
	//nusoap.php klasea gehitzen dugu
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');
	
	//soapclient motako objektua sortzen dugu
	//erabiliko den SOAP zerbitzua non dagoen zehazten urla
	$soapclient = new nusoap_client('http://localhost/wsra16/PHP/passEgiaztatu.php?wsdl',false);
	
	//Web-Service-n inplementatu dugun funtzioari dei egiten diogu
	//eta itzultzen diguna inprimatzen dugu
	$result = $soapclient->call('egiaztatuP', array('pasahitza' => $_POST['pass']));
	
	echo $_POST['pass'];
	print_r($result);
	echo '<h2>Request</h2><pre>'.htmlspecialchars($soapclient->request, ENT_QUOTES).'</pre>';
	echo '<h2>Response</h2><pre>'.htmlspecialchars($soapclient->response, ENT_QUOTES).'</pre>';
	//echo '<h2>Debug</h2><pre>'.htmlspecialchars($soapclient->debug_str, ENT_QUOTES).'</pre>';
?>