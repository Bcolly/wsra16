<?php
	include "./konektatu.php";
	$sql="UPDATE galdera 
	SET Galdera='$_GET[question]',Zailtasuna='$_GET[zail]'
	WHERE GalderaZbkia=$_GET[zbki]";

	if ($niremysqli->query($sql) === TRUE) {
		echo "Aldaketa ondo egin da";
	} else {
		echo "Error aldaketa egitean: " . $niremysqli->error;
	}
	$niremysqli->close();
?>