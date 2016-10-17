<?php
//$niremysqli = new mysqli("mysql.hostinger.es", "u513906433_obeas", "oier0886", "u513906433_quiz");
$niremysqli = new mysqli("localhost", "root", "", "quiz");
$giz = $niremysqli->query("SELECT Galdera, Zailtasuna FROM galdera");
echo '<table border=1> <tr> <th> GALDERA </th> <th> ZAILTASUNA
</th>';
/*while($row = $giz->fetch_object()) {
	echo '<tr><td>'.$row->Izena.'</td> <td>'.$row->Abizena1.'</td> <td>'.$row->Abizena2.'</td> <td>'.$row->PostaElektronikoa.
	'</td> <td>'.$row->Sexua.'</td> <td>'.$row->TelefonoZbkia.'</td> <td>'.$row->Espezialitatea.'</td> <td>'.$row->Interesak.'</td> <td><img src= /></td> </tr>';
}*/
while($row = $giz->fetch_assoc()) {
	echo "<tr>";
	echo "<td>" . $row["Galdera"] . "</td><td>" . $row["Zailtasuna"]. "</td>";
	echo "</tr>";
}
echo '</table>';
echo "<p> <a href='layout.html'> -=HOME=-</a> </p>";
$giz->close();
$niremysqli->close();
?>