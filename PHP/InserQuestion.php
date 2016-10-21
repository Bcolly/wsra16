<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<br />
	<b>Kaixo </b>
	<br />
	<p><b>Galdera berria sortu:</b></p>
	<form id="iquestion" name="iquestion" onSubmit='InsertQuestion.php' method="GET">
			<b>Galdera* : </b>
			<input type="text" id="question" name="question" />
			<br />
			<b>Erantzuna* :</b>
			<input type="text" id="answer" name="answer" />
			<br />
			<b>Zailtasuna :</b><br /><select id="zailtasuna" name="zailtasuna">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
			<br />
			<input type="submit" id="submit" value="Bidali galdera" />
	</form>
</body>
</html>

<?php
	if(isset($_GET['question'],$_GET['answer'])){
		include "./konektatu.php";
		
		$eposta = $_SESSION['user'];
		echo $eposta;
		$sql = "INSERT INTO galdera(Galdera,Erantzuna,Zailtasuna,PostaElektronikoa) 
		VALUES ('$_GET[question]' , '$_GET[answer]' , '$_GET[zailtasuna]', '$eposta')";
		if (!$niremysqli->query($sql)){
			echo "Taularen sorrerak huts egin: (" .
			$mysqli->errno . ") " . $mysqli->error;
			die('Errorea: ' . $niremysqli->error);
		}
		else { echo "Galdera gehitu da";}
		
		$aux = "SELECT IdKon,PostaElektronikoa FROM konexioak";
		$giz = $niremysqli->query($aux);
		
		while($row = $giz->fetch_assoc()){  // taula osoa hautatu dugu bestela fetch_assoc-ek errorea ematen zuen:
											// Fatal error: Call to a member function fetch_assoc() on boolean
			if($row["PostaElektronikoa"]==$eposta){
				$lerroak = $row["IdKon"];
			}
		}
		echo $lerroak;
		
		$ekintza = "Galdera txertatu";
		
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		echo $ip;
		$sqla = "INSERT INTO ekintzak(KonexioIdentitifikazioa,PostaElektronikoa,EkintzaMota,IPa)
				VALUES('$lerroak', '$eposta', '$ekintza', '$ip')";
		if (!$niremysqli->query($sqla)){
			echo "Taularen sorrerak huts egin: (" .
			$mysqli->errno . ") " . $mysqli->error;
			die('Errorea: ' . $niremysqli->error);
		}
		else { echo "Ekintza gehitu da";}
		//XML empieza aqui
		
		
		
		$niremysqli->close();
	}
		
	echo "<p> <a href='../layout.html'>-=HOME=-</a> </p>";
?>