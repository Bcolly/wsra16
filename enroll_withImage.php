<?php
//$niremysqli = new mysqli("mysql.hostinger.es", "u513906433_obeas", "oier0886", "u513906433_quiz");
$niremysqli = new mysqli("localhost", "root", "", "quiz");
if ($niremysqli->connect_errno) {
echo "Huts egin du konexioak MySQL-ra: (" . $niremysqli-> connect_errno . ") " . $niremysqli-> connect_error;
}
echo $niremysqli->host_info . "\n";
$argazkia =addslashes(file_get_contents($_FILES['irudi']['tmp_name']));
$esp = $_POST[espezialitatea];
echo $esp;
if ($esp=="Besterik") {
	$esp = $_POST[testua];
	echo $esp;
}
$sql = "INSERT INTO erabiltzailea(Izena, Abizena1, Abizena2, PostaElektronikoa, Sexua, Pasahitza, TelefonoZbkia, Espezialitatea, Interesak, Irudia)
VALUES ('$_POST[izena]' , '$_POST[abizena1]' , '$_POST[abizena2]' , '$_POST[maila]' , '$_POST[sex]' , '$_POST[pass]' , '$_POST[telf]' , '$esp' , '$_POST[interes]' , '$argazkia')";
//echo $sql;
if (!$niremysqli->query($sql)){
echo "Taularen sorrerak huts egin: (" .
$mysqli->errno . ") " . $mysqli->error;
die('Errorea: ' . $niremysqli->error);
}
else { echo "OK";}
echo "Erregistro bat gehitu da!";
echo "<p> <a href='showUsers_whitImage.php'> Erregistroak ikusi</a>";
$niremysqli->close();
?>