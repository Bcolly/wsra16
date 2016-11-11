<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" language = "javascript">	
		
	</script>
</head>
<body onload="...">
	<h3> Erabiltzaileen galderak:</h3>
	<div id="divTaula" style="display:none">
	</div><br />
	<form id="editatu" name="editatu" method="POST" onsubmit="...">
			<b>Galdera: </b>
			<input type="text" id="question" name="question" />
			<br />
			<b>Erantzuna:</b>
			<input type="text" id="answer" name="answer" />
			<br />
			<b>Zailtasuna :</b><br /><select id="zailtasuna" name="zailtasuna">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
			<br /><br />
			<input type="submit" id="submit" value="Bidali galdera" />
	</form>
		<p> <a href='../layout.html'>-=HOME=-</a> </p>
</body>
</html>

<?php
include "./konektatu.php";
if(strlen($_SESSION['user'])==0){
	header("Location:./Sign_in.php");
}
else{
	$giz = $niremysqli->query("SELECT PostaElekrtronikoa,Galdera,Zailtasuna FROM galdera");
	echo '<table border=1> <tr> <th> ERABILTZAIELA </th> <th> GALDERA </th> <th> ZAILTASUNA </th> </tr>';

	while($row = $giz->fetch_assoc()) {
		echo "<tr>";
		echo "<td>" . $row["PostaElekrtronikoa"] . "</td><td>" . $row["Galdera"] . "</td><td>" . $row["Zailtasuna"]. "</td>";
		echo "</tr>";
	}
	echo '</table>';
}

?>