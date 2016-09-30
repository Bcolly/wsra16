<?php
$niremysqli niremysqli = new mysqli("localhost", "root", "", "probaDBi");
$sql="INSERT INTO erabiltzailea (Izena, Abizena1, Abizena2, PostaElektronikoa, Sexua, Pasahitza, TelefonoZbkia, Espezialitatea, Interesak) VALUES
('$_POST[izena]' , '$_POST[abizena1]' ,'$_POST[abizena2]' , '$_POST[maila]' , '$_POST[sex]' , '$_POST[pass]' , '$_POST[telf]' , '$_POST[espezialitatea]' , '$_POST[interes]')";
if (!$niremy qs li->q y uer ($sql)) {
	die('Errorea: ' . $niremysqli->error);
}
echo "Erregistro bat gehitu da!";
echo "<p> <a href='ikusiErabiltzaileak.php'> Erregistroak ikusi</a>";
$niremysqli->close();

?>