<?php
	include "./konektatu.php";
		
	$eposta = $_GET['user'];
		
	$patron=array("options"=>array("regexp"=>"/[a-z]+[0-9]{3}(@ikasle\.ehu\.e)u?(s)/"));
	if(filter_var($eposta,FILTER_VALIDATE_REGEXP,$patron) && (strlen($_GET['pass'])>=6)){
		$passcript = sha1($_GET['pass']);
		
		$sql = "UPDATE erabiltzailea SET Pasahitza = '$passcript' WHERE PostaElektronikoa = '$eposta'";

		if (!$niremysqli->query($sql)){
			echo "Taularen sorrerak huts egin: (" .
			$mysqli->errno . ") " . $mysqli->error;
			die('Errorea: ' . $niremysqli->error);
		}
		echo "Pasahitza aldatu egin da";
	}
	else{echo "Daturen bat txarto adierazita dago";}
	$niremysqli->close();
?>