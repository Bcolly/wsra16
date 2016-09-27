function balioztatu(){
		var mezua = "";
		var errorea = "TXARTO ADIERAZITAKO ATALAK:\n\n";
		var todoVaBien = true;
		var unekoa=document.getElementById("erregistro");
		for(i=0;i<unekoa.elements.length;i++){
			if(todoVaBien){
				mezua +="IZENA: " + unekoa.elements[i].name+" -=- ";
				mezua +="BALIOA: " + unekoa.elements[i].value+"\n";
			}
		}
		if(todoVaBien){alert(mezua);}
		else {alert(errorea);}
	}