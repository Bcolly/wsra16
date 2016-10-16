<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<p><b>AUTENTIFIKATU ZAITEZ:</b></p>
	<form id="login" name="login" onSubmit='Sing_in.php' method="POST">
			<br />
			<b>Erabiltzailea: </b>
			<input type="text" id="user" name="user" />
			<br />
			<b>Pasahitza :</b>
			<input type="password" id="pass" name="pass" />
			<br />
			<input type="submit" id="submit" value="Sartu" />
	</form>
</body>
</html>

<?php
	if(isset($_POST['user'],$_POST['pass'])){
		//$niremysqli = new mysqli("mysql.hostinger.es", "u513906433_obeas", "oier0886", "u513906433_quiz");
		$niremysqli = new mysqli("localhost", "root", "", "quiz");
		if ($niremysqli->connect_errno) {
			echo "Huts egin du konexioak MySQL-ra: (" . $niremysqli-> connect_errno . ") " . $niremysqli-> connect_error;
		}
		echo $niremysqli->host_info . "\n";
		
		$eposta = $_POST['user'];
		$giz = $niremysqli->query("SELECT Pasahitza FROM erabiltzailea WHERE PostaElektronikoa='$eposta'");
		$row = $giz->fetch_assoc();
		if ($_POST['pass']===$row["Pasahitza"]) {
			session_start();
			$_SESSION['user'] = $eposta;
			header("Location: ./InserQuestion.php");
			exit;
		}
		else{echo "<p> <a href='layout.html'> -=HOME=-</a> </p>";}

	}
?>