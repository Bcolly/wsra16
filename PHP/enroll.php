<?php
include "./konektatu.php";
$esp = $_POST[espezialitatea];

if ($esp=="Besterik") {
	$esp = $_POST[testua];
}
$sql = "INSERT INTO erabiltzailea(Izena, Abizena1, Abizena2, PostaElektronikoa, Sexua, Pasahitza, TelefonoZbkia, Espezialitatea, Interesak)
VALUES ('$_POST[izena]' , '$_POST[abizena1]' , '$_POST[abizena2]' , '$_POST[maila]' , '$_POST[sex]' , '$_POST[pass]' , '$_POST[telf]' , '$esp' , '$_POST[interes]')";
echo $sql;

	if (!$niremysqli->query($sql)){
	echo "Taularen sorrerak huts egin: (" .
	$mysqli->errno . ") " . $mysqli->error;
	die('Errorea: ' . $niremysqli->error);
}
else { echo "OK";}
echo "Erregistro bat gehitu da!";
echo "<p> <a href='showUsers.php'> Erregistroak ikusi</a>";
// Konexioa itxi
$niremysqli->close();
?>