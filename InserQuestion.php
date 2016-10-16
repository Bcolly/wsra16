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
		//$niremysqli = new mysqli("mysql.hostinger.es", "u513906433_obeas", "oier0886", "u513906433_quiz");
		$niremysqli = new mysqli("localhost", "root", "", "quiz");
		if ($niremysqli->connect_errno) {
			echo "Huts egin du konexioak MySQL-ra: (" . $niremysqli-> connect_errno . ") " . $niremysqli-> connect_error;
		}
		echo $niremysqli->host_info . "\n";
		session_start();
		$badago = $niremysqli->query("SELECT COUNT(GalderaZbkia) FROM `galdera`");
		$total = $badago->fetch_assoc();
		$lerroak = $total["COUNT(GalderaZbkia)"];
		if($lerroak==0){
			$galdZenb=1;
		}else{
			$galdZenb = $lerroak+1;
		}
		echo $galdZenb;
		$eposta = $_SESSION['user'];
		echo $eposta;
		$sql = "INSERT INTO galdera(GalderaZbkia,Galdera,Erantzuna,Zailtasuna,PostaElektronikoa) 
		VALUES ($galdZenb , '$_GET[question]' , '$_GET[answer]' , '$_GET[zailtasuna]', '$eposta')";
		if (!$niremysqli->query($sql)){
			echo "Taularen sorrerak huts egin: (" .
			$mysqli->errno . ") " . $mysqli->error;
			die('Errorea: ' . $niremysqli->error);
		}
		else { echo "Galdera gehitu da";}
		
		$niremysqli->close();
	}
		
	echo "<p> <a href='layout.html'> -=HOME=-</a> </p>";
?>