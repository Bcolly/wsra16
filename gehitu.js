function gehitu(){
	
	var aux = document.getElementById("espezialitatea");
	var y = document.getElementById("testua");
		if(aux.value == "4"){
			y.style.display = "inline";
		}
		else{y.style.display = "none";}
}

/*function irudia(){
	
	var aux = document.getElementById("irudi");
	alert(aux.value);
	var aux1 = document.getElementById("image");
	aux1.style.display = "inline";
	aux1.src += aux.value;
	
}*/