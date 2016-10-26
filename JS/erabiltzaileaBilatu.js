function bilatu() {
	alert ("programa asi da");
	var xml = document.getElementById('xml').contentDocument;
	var emailList = xml.getElementByTagName("eposta");
	var izenList = xml.getElementByTagName("izena");
	var ab1List = xml.getElementByTagName("abizena1");
	var ab2List = xml.getElementByTagName("abizena2");
	var telList = xml.getElementByTagName("telefonoa");
	var aurkitua = false;
	for (var i = 0; i < emailList.length; i++) {
		if (emailList[i].childNodes[0].nodeValue == document.getElementById("eposta").value) {
			aurkitua = true;
				
			document.getElementById("izena").style.display = "inline";
			document.getElementById("izena").value = izenList[i].childNodes[0].nodeValue;
			document.getElementById("abizena1").style.display = "inline";
			document.getElementById("abizena1").value = ab1List[i].childNodes[0].nodeValue;
			document.getElementById("abizena2").style.display = "inline";
			document.getElementById("abizena2").value = ab2List[i].childNodes[0].nodeValue;
			document.getElementById("telefonoa").style.display = "inline";
			document.getElementById("telefonoa").value = telListList[i].childNodes[0].nodeValue;
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