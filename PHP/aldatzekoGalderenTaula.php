<?php
	include "./konektatu.php";
	
		$giz = $niremysqli->query("SELECT * FROM galdera");
		echo '<table border=1> <tr><th> ERABILTZAILEA </th> <th> GALDERA </th> <th> ZAILTASUNA </th> </tr>';

		while($row = $giz->fetch_assoc()) {
			echo "<tr><form id='$row[GalderaZbkia]' name='$row[GalderaZbkia]' 
			method='post' onsubmit='aldatu($row[GalderaZbkia],
			question.value,
			zailtasuna.value)'>
			<td><input type='text' id='user' name='user' value='$row[PostaElektronikoa]' style='width:200px;' readonly/></td>
			<td><input type='text' id='question' name='question' value='$row[Galdera]' style='width:150px;'/></td>
			<td><input type='text' id='zailtasuna' name='zailtasuna' value='$row[Zailtasuna]'/></td>
			<td><input type='submit' value='Eguneratu'></td>
			<input type='text' id='zenbakia' value='$row[GalderaZbkia]' style='display:none'></td>
			</form></tr>";
		}
		echo '</table>';
?>