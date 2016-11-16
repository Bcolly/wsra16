	var balioak = false;
	var eposta = false;
	var pasahitza = false;
	
	var aux1 = /[0-9]{9}/;
	var aux2 = /[a-z]+[0-9]{3}(@ikasle.ehu.e)u?(s)/;
	var aux3 = /[A-Z]{1}[a-z]/;
	
	function balioztatu(){
		var mezua = "";
		var errorea = "TXARTO ADIERAZITAKO ATALAK:\n\n";
		var todoVaBien = true;
		var unekoa=document.getElementById("erregistro");
		var pasahitza = document.getElementById("egiazPass").value;
		
		for(i=0;i<unekoa.elements.length;i++){
			
			if(unekoa.elements[i].name=="izena" &&(unekoa.elements[i].value<1 || !aux3.test(unekoa.elements[i].value))){
				//alert("izena hutsik dago");
				todoVaBien = false;
				errorea +="IZENA: ez duzu bete, edo txarto adierazi duzu.\n\n";
			}
			else if(unekoa.elements[i].name=="abizena1" &&( unekoa.elements[i].value<1 || !aux3.test(unekoa.elements[i].value))){
				//alert("izena hutsik dago");
				todoVaBien = false;
				errorea +="ABIZENA_1: ez duzu bete, edo txarto adierazi duzu.\n\n";
			}
			else if(unekoa.elements[i].name=="abizena2" &&( unekoa.elements[i].value<1 || !aux3.test(unekoa.elements[i].value))){
				//alert("izena hutsik dago");
				todoVaBien = false;
				errorea +="ABIZENA_2: ez duzu bete, edo txarto adierazi duzu.\n\n";
			}
			else if(unekoa.elements[i].name=="pass" && (unekoa.elements[i].value.length<6 || unekoa.elements[i].value.localeCompare(pasahitza)!=0)){
				//alert("pasahitza ez duzu sartu, edo ez du luzeera nahikorik");
				todoVaBien = false;
				errorea +="PASAHITZA: pasahitza ez duzu ongi bete edo ez dute pasahizak kointziditzen.\n\n";
			}
			else if(unekoa.elements[i].name=="telf" && !aux1.test(unekoa.elements[i].value)){
				//alert("telefonoa adierazi gabe, edo txarto adierazi duzu");
				todoVaBien = false;
				errorea +="TELEFONOA: ez duzu bete edo ez dituzu digitu guztiak jarri edo zenbaki bat ez den zeozer sartu duzu.\n\n";
			}
			else if(unekoa.elements[i].name=="maila" && !aux2.test(unekoa.elements[i].value)){
				//alert("emaila ondo adierazi mesedez.\nAdibide bat: erabiltzailea001@ikasle.ehu.e(u)s");
				todoVaBien = false;
				errorea +="EMAILA: emaila ondo adierazi mesedez.\nAdibide bat: erabiltzailea001@ikasle.ehu.e(u)s\n\n";
			}
			if(todoVaBien){
				mezua +="IZENA: " + unekoa.elements[i].name+" -=- ";
				mezua +="BALIOA: " + unekoa.elements[i].value+"\n";
			}
		}
		if(todoVaBien){
			balioak = true;
			alert(mezua);
		}
		else {alert(errorea);}
	}
	
	function balioztatuEposta(email){
		xhttp = new XMLHttpRequest();
		
		xhttp.onreadystatechange = function(){
			if ((xhttp.readyState==4)&&(xhttp.status==200)){
				if(xhttp.responseText == "BAI"){
					eposta = true;
				}
				else{
					eposta = false;
				}
			}
		};
		//xhttp.open("GET","http://localhost/wsra16/PHP/Bezeroa_egiaztatuMatrikula.php?maila=" + email, true);
		xhttp.open("GET","http://oibeas16.esy.es/PHP/Bezeroa_egiaztatuMatrikula.php?maila=" + email, true);
		xhttp.send();
	}
	
	function balioztatuPasahitza(pass){
		if (pass.length >= 1) {
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
			if ((xhttp.readyState==4)&&(xhttp.status==200)){
				if(xhttp.responseText == "BALIOZKOA"){
					pasahitza = true;
				}
				else {pasahitza = false;}
			}};
			//xhttp.open("GET","http://localhost/wsra16/PHP/Bezeroa_passEgiaztatu.php?pass="+pass, true);
			xhttp.open("GET","http://oibeas16.esy.es/PHP/Bezeroa_passEgiaztatu.php?pass="+pass, true);
			xhttp.send();
		}
		else {pasahitza = false;}
	}
	
	function egiaztapenak() {
		balioztatu();
		if (balioak && eposta && pasahitza) {
			return true;
		}
		else {
			return false;
		}
	}
	
	function aldatu(erab, pass, passEgi){
		if (!pasahitza || (pass.localeCompare(passEgi) != 0) || !aux2.test(erab) || (pass.length<6)){
			alert("Error: Datuak txarto adierazita");
		}
		else {
			xhttp = new XMLHttpRequest();
			
			xhttp.onreadystatechange = function(){
				if ((xhttp.readyState==4)&&(xhttp.status==200 )){ 
					alert(xhttp.responseText);
				}
			};
				xhttp.open("GET","http://oibeas16.esy.es/PHP/passAldatu.php?user="+erab+"&pass="+pass, false);
				//xhttp.open("GET","http://localhost/wsra16/PHP/passAldatu.php?user="+erab+"&pass="+pass, false);
				xhttp.send();
				pasahitza=false;
				document.getElementById("update").style.display = "none";
		}
	}		