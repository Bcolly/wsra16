<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form id="login" name="login" onSubmit='desblokeo.php' method="POST">
			<br />
			<b>Erabiltzailea: </b>
			<input type="text" id="user" name="user" />
			<br />
			<input type="submit" id="submit" value="Desblokeatu Kontua." />
	</form>
</body>
</html>
<?php
		session_start();
		if(isset($_POST['user'],$_SESSION[$_POST['user']])){
			$_SESSION[$_POST['user']]="DESBLOKEATUTA";
			header("Location:./Sign_in.php");
		}
?>