<?php
$esteka = mysqli_connect("localhost", "root", "", “Quiz");
//(“hostinger_aterpea, “hostinger_erab", “pasahitza", “db_izena");
if (!$esteka){ 
echo “Hutsegitea MySQLra konetatzerakoan. “ .” . PHP_EOL;
echo "errno depurazio katsa: " . mysqli_connect_errno().PHP_EOL;
echo "error depurazio katsa: " . mysqli_connect_error().PHP_EOL;
exit;
}
else{
	$sql = mysql_query($esteka, "INSERT INTO erabiltzailea() VALUES ()")
	$ema = mysqli_query($esteka,$sql);
	if (!$ema){
		die('Errorea query-a gauzatzerakoan: '.mysqli_error($esteka));
	}
	echo “OK”;
}
// Konexioa itxi
mysqli_close($esteka)

?>