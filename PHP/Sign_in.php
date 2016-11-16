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
		include "./konektatu.php";
		if(!isset($_SESSION['kont'])){
		$_SESSION['kont']=0;
		}
		if(isset($_POST['user'],$_POST['pass'])){

		if(!isset($_SESSION[$_POST['user']])){
			$_SESSION[$_POST['user']]="DESBLOKEATUTA";
		}
		else{
			if($_SESSION[$_POST['user']]=="BLOKEATUTA"){
				echo("<a href='./desblokeo.php'> -=Desblokeatu kontua=-</a>");
			}
		}
		$eposta = $_POST['user'];
		//pasahitza sha1 erabiliz kriptografiatu
		$passcript = sha1($_POST['pass']);
		$giz = $niremysqli->query("SELECT Pasahitza FROM erabiltzailea WHERE PostaElektronikoa='$eposta'");
		$row = $giz->fetch_assoc();
		if ($passcript===$row["Pasahitza"] && $_SESSION[$_POST['user']]=="DESBLOKEATUTA") {
			$_SESSION['kont']=0;
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
		else{
			if($_SESSION['kont']==2){
				
				$_SESSION[$_POST['user']]="BLOKEATUTA";
				
				echo("Kontua blokeatua izan da.");
				echo("Pasahitza ahaztu baduzu, alda dezakezu.");
				$_SESSION['kont']=0;
				echo("<a href='./desblokeo.php'> -=Desblokeatu kontua=-</a>");
			}
			else{
				$_SESSION['kont']++;
			}
		}
	}
?>