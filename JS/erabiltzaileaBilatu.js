function bilatu() {
	var xml = document.getElementById('erabxml').contentDocument;
	var emailList = xml.getElementsByTagName("eposta");
	var izenList = xml.getElementsByTagName("izena");
	var ab1List = xml.getElementsByTagName("abizena1");
	var ab2List = xml.getElementsByTagName("abizena2");
	var telList = xml.getElementsByTagName("telefonoa");
	var aurkitua = false;
	for (var i = 0; i < emailList.length; i++) {
		if (emailList[i].childNodes[0].nodeValue == document.getElementById("posta").value) {
			aurkitua = true;
				
			document.getElementById("izena").style.display = "inline";
			document.getElementById("izena").value = izenList[i].childNodes[0].nodeValue;
			document.getElementById("abizena1").style.display = "inline";
			document.getElementById("abizena1").value = ab1List[i].childNodes[0].nodeValue;
			document.getElementById("abizena2").style.display = "inline";
			document.getElementById("abizena2").value = ab2List[i].childNodes[0].nodeValue;
			document.getElementById("telefonoa").style.display = "inline";
			document.getElementById("telefonoa").value = telList[i].childNodes[0].nodeValue;
			break;
		}
	}
	if (!aurkitua) {
		alert ('Bilatzen ari zaren erabiltzailea ez da aurkitu');
		document.getElementById("izena").style.display = "none";
		document.getElementById("abizena1").style.display = "none";
		document.getElementById("abizena2").style.display = "none";
		document.getElementById("telefonoa").style.display = "none";
	}

}