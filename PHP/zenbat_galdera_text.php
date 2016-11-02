<?php

include "./konektatu.php";
$eposta = $_SESSION['user'];
$giz = $niremysqli->query("SELECT COUNT(*) FROM galdera");
$gizu = $niremysqli->query("SELECT COUNT(*) FROM galdera WHERE PostaElektronikoa = '".$eposta."'");
$row = $giz->fetch_assoc();
$row1 = $gizu->fetch_assoc();
echo("<p>Nire galderak / Galdera Guztiak: '".$row1['COUNT(*)']."' / '".$row['COUNT(*)']."'</p>");
?>