function erakutsi(){
	//alert('algo va mal');
	var xml;
	if(window.XMLHttpRequest){
		xml= new XMLHttpRequest();
	}
	else{
		xml=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	if(!xml){
		alert('algo va mal');
	}
	
	xml.open("GET","../XML/galderak.xml",false);
	xml.send();
	
	var xmlDoc=xml.responseXML;
	alert(xmlDoc);
	
}