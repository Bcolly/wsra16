<?php
	$xml = simplexml_load_file('../XML/galderak.xml');
	echo '<table border=1> <tr> <th> GALDERA </th> <th> KONPLEXUTASUNA </th> <th> GAIA </th>';
	foreach ($xml->assessmentItem as $nodo)
	{
		echo "<tr>";
		echo "<td>" . $nodo->itemBody->p . "</td>";
		echo "<td>" . $nodo['complexity'] . "</td>";
		echo "<td>" . $nodo['subject'] . "</td>";
		echo "</tr>";
	}
	
	echo "<p> <a href='../layout.html'> -=HOME=-</a> </p>";
?>