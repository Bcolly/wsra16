<?php
include "./konektatu.php";

$patron=array("options"=>array("regexp"=>"/[a-z]+[0-9]{3}(@ikasle\.ehu\.e)u?(s)/"));
$patron1=array("options"=>array("regexp"=>"/^[A-Z]{1}[a-z]+$/"));
$patron2=array("options"=>array("regexp"=>"/^[0-9]{9}$/"));
if(filter_var($_POST['maila'],FILTER_VALIDATE_REGEXP,$patron) 
&& filter_var($_POST['izena'],FILTER_VALIDATE_REGEXP,$patron1) 
&& filter_var($_POST['abizena1'],FILTER_VALIDATE_REGEXP,$patron1) 
&& filter_var($_POST['abizena2'],FILTER_VALIDATE_REGEXP,$patron1) 
&& filter_var($_POST['telf'],FILTER_VALIDATE_REGEXP,$patron2)
&& (strlen($_POST['pass'])>=6)
&& (strlen($_POST['pass'])<15)){

	$argazkia =addslashes(file_get_contents($_FILES['irudi']['tmp_name']));
	$esp = $_POST[espezialitatea];
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

}
else{echo "Emaila txarto gorde da edota txarto adierazita dago."; 
	 echo "Izena txarto adierazita dago.";
	 echo "Lehen abizena txarto adierazita dago.";
	 echo "Bigarren abizena txarto adierazita dago.";
	 echo "Telefonoa txarto adierazita dago.";
	}

echo "<p> <a href='../layout.html'> -=HOME=-</a> </p>";

$niremysqli->close();
?>