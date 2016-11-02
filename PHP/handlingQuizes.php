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
				xhttp.open("GET","insertQuestion.php?"+"question="+ques+"&answer="+ans+"&zailtasuna="+zail+"&subject="+subj, true);
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
			var myVar = setInterval(galderakZati, 5000);
		}
	</script>
</head>
<body onload="refresh()">
	<br />
	<b>Kaixo </b>
	<br />
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
