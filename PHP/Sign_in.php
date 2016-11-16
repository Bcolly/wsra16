<!DOCTYPE html>
<html>
<head>
	<script src="../JS/balioztatu.js"></script>
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
	<input type="button" value="Pasahitza ahaztu dut" onclick='document.getElementById("update").style.display = "inline";'>
	<br/><br/>
	<form id="update" name="update" onSubmit='aldatu(userA.value,passA.value,passEgi.value)' method="POST" style="display:none">
			<p><b>Pasahitz Berria:</b></p>
			<b>Erabiltzailea: </b>
			<input type="text" id="userA" name="userA" />
			<br />
			<b>Pasahitza :</b>
			<input type="password" id="passA" name="passA" onblur="balioztatuPasahitza(passA.value)"/>
			<br />
			<b>Errepikatu pasahitza :</b>
			<input type="password" id="passEgi" name="passEgi" />
			<br />
			<input type="submit" id="submit" value="Aldatu" />
	</form>
	<p> <a href='../layout.html'> -=HOME=-</a> </p>
</body>
</html>

<?php
	if(isset($_POST['user'],$_POST['pass'])){
		include "./konektatu.php";
		
		$eposta = $_POST['user'];
		//pasahitza sha1 erabiliz kriptografiatu
		$passcript = sha1($_POST['pass']);
		
		$giz = $niremysqli->query("SELECT Pasahitza FROM erabiltzailea WHERE PostaElektronikoa='$eposta'");
		$row = $giz->fetch_assoc();
		if ($passcript===$row["Pasahitza"]) {
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