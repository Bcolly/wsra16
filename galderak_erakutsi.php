<?php
//$niremysqli = new mysqli("mysql.hostinger.es", "u513906433_obeas", "oier0886", "u513906433_quiz");
$niremysqli = new mysqli("localhost", "root", "", "quiz");
$giz = $niremysqli->query("SELECT Galdera, Zailtasuna FROM galdera");
echo '<table border=1> <tr> <th> GALDERA </th> <th> ZAILTASUNA
</th>';

while($row = $giz->fetch_assoc()) {
	echo "<tr>";
	echo "<td>" . $row["Galdera"] . "</td><td>" . $row["Zailtasuna"]. "</td>";
	echo "</tr>";
}
echo '</table>';
echo "<p> <a href='layout.html'> -=HOME=-</a> </p>";

session_start();
if(strlen($_SESSION['user'])==0){
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	echo " todo bien";
	echo $ip;
	$ekintza = "Galderak begiratu.";
	$sqla = "INSERT INTO ekintzak(EkintzaMota,IPa)
			VALUES('$ekintza', '$ip')";
	if (!$niremysqli->query($sqla)){
		echo "Taularen sorrerak huts egin: (" .
		$mysqli->errno . ") " . $mysqli->error;
		die('Errorea: ' . $niremysqli->error);
	}
	else { echo "Ekintza gehitu da";}
}
else{
	$eposta = $_SESSION['user'];
	$aux = "SELECT IdKon,PostaElektronikoa FROM konexioak";
	$aux1 = $niremysqli->query($aux);
	
	while($row = $aux1->fetch_assoc()){ // taula osoa hautatu dugu bestela fetch_assoc-ek errorea ematen zuen:
										// Fatal error: Call to a member function fetch_assoc() on boolean
		if($row["PostaElektronikoa"]==$eposta){
			$lerroak = $row["IdKon"];
		}
	}
	echo $lerroak;
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	echo " todo bien";
	echo $ip;
	$ekintza = "Galdera begiratu.";
	$sqla = "INSERT INTO ekintzak(KonexioIdentitifikazioa,PostaElektronikoa,EkintzaMota,IPa)
			VALUES('$lerroak', '$eposta', '$ekintza', '$ip')";
	if (!$niremysqli->query($sqla)){
		echo "Taularen sorrerak huts egin: (" .
		$mysqli->errno . ") " . $mysqli->error;
		die('Errorea: ' . $niremysqli->error);
	}
	else { echo "Ekintza gehitu da";}
}


$giz->close();
$niremysqli->close();
?>