<?php
	include "./konektatu.php";
	if(strlen($_SESSION['user'])==0 || strcmp($_SESSION['user'],"web000@ehu.es")!=0){
		header("Location:./Sign_in.php");
	}
	else{
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" language = "javascript">	
		function aldatu(zbki, ques, zail){
			xhttp = new XMLHttpRequest();
			
			xhttp.onreadystatechange = function(){
				if ((xhttp.readyState==4)&&(xhttp.status==200)){ 
					alert(xhttp.responseText);
					//document.getElementById("aldaketa").innerHTML=xhttp.responseText;
				}
			};
				//xhttp.open("GET","http://localhost/wsra16/PHP/updateQuestion.php?zbki="+zbki+"&question="+ques+"&zail="+zail, false);
				xhttp.open("GET","http://oibeas16.esy.es/PHP/updateQuestion.php?zbki="+zbki+"&question="+ques+"&zail="+zail, false);
				xhttp.send();
		}
	</script>
</head>
<body>
	<h3> Erabiltzaileen galderak:</h3>
	<div id="divTaula">
		<?php
				include "aldatzekoGalderenTaula.php";
		?>
	</div><br />
	<div id="aldaketa"></div> 
	<p> <a href='../layout.html'>-=HOME=-</a> </p>
</body>
</html>
<?php
	}
?>