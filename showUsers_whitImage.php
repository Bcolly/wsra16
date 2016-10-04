<?php
//$niremysqli = new mysqli("mysql.hostinger.es", "u513906433_obeas", "oier0886", "u513906433_quiz");
$niremysqli = new mysqli("localhost", "root", "", "quiz");
$giz = $niremysqli->query("SELECT * FROM erabiltzailea");
echo '<table border=1> <tr> <th> IZENA </th> <th> ABIZENA1
</th> <th> ABIZENA2 </th> <th> EPOSTA </th> <th> SEXUA </th> <th> TELEFONOA </th> <th> ESPEZIALITATEA </th> <th> INTERESAK </th> <th> IRUDIA </th></tr> ';
/*while($row = $giz->fetch_object()) {
	echo '<tr><td>'.$row->Izena.'</td> <td>'.$row->Abizena1.'</td> <td>'.$row->Abizena2.'</td> <td>'.$row->PostaElektronikoa.
	'</td> <td>'.$row->Sexua.'</td> <td>'.$row->TelefonoZbkia.'</td> <td>'.$row->Espezialitatea.'</td> <td>'.$row->Interesak.'</td> <td><img src= /></td> </tr>';
}*/
while($row = $giz->fetch_assoc()) {
	echo "<tr>";
	echo "<td>" . $row["Izena"] . "</td><td>" . $row["Abizena1"]. "</td><td>" . $row["Abizena2"]. "</td><td>" . $row["PostaElektronikoa"]. "</td><td>" . $row["Sexua"]. "</td><td>" . $row["TelefonoZbkia"]. "</td><td>" . $row["Espezialitatea"]. "</td><td>" . $row["Interesak"]. "</td><td><img src='data:Irudia/jpeg;base64,".base64_encode( $row['Irudia'] )."' width='100px' /></td>";
	echo "</tr>";
}
echo '</table>';
$giz->close();
$niremysqli->close();
?>	