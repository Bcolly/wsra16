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
	<p> <a href='../layout.html'> -=HOME=-</a> </p>
</body>
</html>

<?php
	if(isset($_POST['user'],$_POST['pass'])){
		include "./konektatu.php";
		
		$eposta = $_POST['user'];
		
		$giz = $niremysqli->query("SELECT Pasahitza FROM erabiltzailea WHERE PostaElektronikoa='$eposta'");
		$row = $giz->fetch_assoc();
		if ($_POST['pass']===$row["Pasahitza"]) {
			$sql = "INSERT INTO konexioak(PostaElektronikoa) VALUES ('$eposta')";
			$giz = $niremysqli->query($sql);
			$_SESSION['user'] = $eposta;
			$ikaslePatroia=array("options"=>array("regexp"=>"/[a-z]+[0-9]{3}(@ikasle\.ehu\.e)u?(s)/"));
			if(filter_var($eposta,FILTER_VALIDATE_REGEXP,$ikaslePatroia)){
				header("Location: ./handlingQuizes.php");
			}
			else {
				header("Location: ./reviewingQuizes.php");
			}	
			exit;
		}
	}
?>