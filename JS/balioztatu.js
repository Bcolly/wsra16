	function balioztatu(){
		var aux1 = /[0-9]{9}/;
		var aux2 = /[a-z]+[0-9]{3}(@ikasle.ehu.e)u?(s)/;
		var aux3 = /[A-Z]{1}[a-z]/;
		var mezua = "";
		var errorea = "TXARTO ADIERAZITAKO ATALAK:\n\n";
		var todoVaBien = true;
		var unekoa=document.getElementById("erregistro");
		
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
			else if(unekoa.elements[i].name=="pass" && unekoa.elements[i].value.length<6 && unekoa.elements[i].value.length>15){
				//alert("pasahitza ez duzu sartu, edo ez du luzeera nahikorik");
				todoVaBien = false;
				errorea +="PASAHITZA: ez duzu bete edo pasahitzak ez dauka luzeera nahikorik.\n\n";
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
		if(todoVaBien){alert(mezua);}
		else {alert(errorea);}
	}