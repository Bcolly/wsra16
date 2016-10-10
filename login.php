<?php
//$niremysqli = new mysqli("mysql.hostinger.es", "u513906433_obeas", "oier0886", "u513906433_quiz");
$niremysqli = new mysqli("localhost", "root", "", "quiz");
if ($niremysqli->connect_errno) {
echo "Huts egin du konexioak MySQL-ra: (" . $niremysqli-> connect_errno . ") " . $niremysqli-> connect_error;
}
echo $niremysqli->host_info . "\n";

$giz = $niremysqli->query("SELECT Pasahitza FROM erabiltzailea WHERE PostaElektronikoa='$_POST[user]'");

?>