<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" language = "javascript">	
		function galderaSartu(ques,ans,zail,subj){	
			xhttp = new XMLHttpRequest();
			
			xhttp.onreadystatechange = function(){
				if ((xhttp.readyState==4)&&(xhttp.status==200 )){ 
					document.getElementById("galderaSartu").style.display = "inline-block";
					document.getElementById("galderaSartu").innerHTML= xhttp.responseText;
				}
			};
				xhttp.open("GET","handlingQuizes.php?"+"question="+ques+"&answer="+ans+"&zailtasuna="+zail+"&subject="+subj, true);
				xhttp.send();
		}
		function nireGalderak(){	
			xhttp = new XMLHttpRequest();
			
			xhttp.onreadystatechange = function(){
				if ((xhttp.readyState==4)&&(xhttp.status==200 )){ 
					document.getElementById("galderakIkusi").style.display = "inline-block";
					document.getElementById("galderakIkusi").innerHTML= xhttp.responseText;
				}
			};
				xhttp.open("GET","showUserQuestion.php", true);
				xhttp.send();
		}
		function galderakZati(){	
			xhttp = new XMLHttpRequest();
			
			xhttp.onreadystatechange = function(){
				if ((xhttp.readyState==4)&&(xhttp.status==200 )){ 
					document.getElementById("divRefresh").style.display = "inline-block";
					document.getElementById("divRefresh").innerHTML= xhttp.responseText;
				}
			};
				xhttp.open("GET","zenbat_galdera_text.php", true);
				xhttp.send();
		}
		
		function refresh() {
			galderakZati();
			var myVar = setInterval(galderakZati, 5000);
		}
	</script>
</head>
<body onload="refresh()">
	<p><b>Galdera berria sortu:</b></p>
	<form id="iquestion" name="iquestion" method="GET" onsubmit="galderaSartu(question.value,answer.value,zailtasuna.value,subject.value)">
			<b>Galdera* : </b>
			<input type="text" id="question" name="question" />
			<br />
			<b>Erantzuna* :</b>
			<input type="text" id="answer" name="answer" />
			<br />
			<b>Zailtasuna :</b><br /><select id="zailtasuna" name="zailtasuna">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
			<br/>
			<b>Gaia: </b>
			<input type="text" id="subject" name="subject" />
			<br /><br />
			<input type="submit" id="submit" value="Bidali galdera" />
			<input type="button" value="NireGalderak" onClick="nireGalderak()" />
	</form>
	<div id="divRefresh" style="display:none">
	</div><br />
	<div id="galderaSartu" style="display:none">
	</div><br />
	<div id="galderakIkusi" style="display:none">
	</div><br />
		<p> <a href='../layout.html'>-=HOME=-</a> </p>
</body>
</html>

<?php
	include "./konektatu.php";
	if(!isset($_SESSION['user']) || strcmp($_SESSION['user'],"web000@ehu.es")==0){
			header("Location:./Sign_in.php");
	}
	else{
				if(isset($_GET['question'],$_GET['answer'])){
					if(($_GET['question'].strlen > 0) && ($_GET['answer'].strlen > 0))
						$eposta = $_SESSION['user'];
						//SQL-n galdera txertatu
						$sql = "INSERT INTO galdera(Galdera,Erantzuna,Zailtasuna,PostaElektronikoa) 
						VALUES ('$_GET[question]' , '$_GET[answer]' , '$_GET[zailtasuna]', '$eposta')";
						if (!$niremysqli->query($sql)){
							echo "Taularen sorrerak huts egin: (" .
							$mysqli->errno . ") " . $mysqli->error;
							die('Errorea: ' . $niremysqli->error);
						}
						//XML-n galdera txertatu
						$xml = simplexml_load_file('../XML/galderak.xml');
						$galdera = $xml->addChild('assessmentItem');
							$galdera->addAttribute('complexity', $_GET[zailtasuna]);
							$galdera->addAttribute('subject', $_GET[subject]);
						
							$galderaT = $galdera->addChild('itemBody');
								$galderaT->addChild('p',$_GET['question']);
							$erantzuna = $galdera->addChild('correctResponse');
								$erantzuna->addChild('value',$_GET[answer]);

						if($xml->asXML("../XML/galderak.xml") === FALSE) {
							echo "<br/>Galderak ez dira XML fitxategian gorde";
						}
						else {
							echo "<br/><a href='./seeXMLQuestions.php'>Ikusi galderak XML bidez</a>";
						}
						
						//konexioa datubasean gehitu
						$aux = "SELECT IdKon,PostaElektronikoa FROM konexioak";
						$giz = $niremysqli->query($aux);
						
						while($row = $giz->fetch_assoc()){  // taula osoa hautatu dugu bestela fetch_assoc-ek errorea ematen zuen:
															// Fatal error: Call to a member function fetch_assoc() on boolean
							if($row["PostaElektronikoa"]==$eposta){
								$lerroak = $row["IdKon"];
							}
						}
						echo $lerroak;
						
						$ekintza = "Galdera txertatu";
						
						if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
							$ip = $_SERVER['HTTP_CLIENT_IP'];
						} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
							$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
						} else {
							$ip = $_SERVER['REMOTE_ADDR'];
						}
						$sqla = "INSERT INTO ekintzak(KonexioIdentitifikazioa,PostaElektronikoa,EkintzaMota,IPa)
								VALUES('$lerroak', '$eposta', '$ekintza', '$ip')";
						if (!$niremysqli->query($sqla)){
							echo "Taularen sorrerak huts egin: (" .
							$mysqli->errno . ") " . $mysqli->error;
							die('Errorea: ' . $niremysqli->error);
						}
						else { echo "<p>Ekintza gehitu da</p>";}
					}
					else{echo "<p>Galdera/Erantzunak ezin du hutsik egon!<p>"}
				}
				$niremysqli->close();
	}
?>