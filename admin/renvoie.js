function renvoie(facture,email)
{
 var params = "numero="+facture+"&email="+email;
 var xhr_object = null; 
 var method = "POST";
 var filename = "renvoie.php";
	
	//alert(params);
	if(window.XMLHttpRequest) // Firefox 
	   xhr_object = new XMLHttpRequest(); 
	else if(window.ActiveXObject) // Internet Explorer 
	   xhr_object = new ActiveXObject("Microsoft.XMLHTTP"); 
	else { // XMLHttpRequest non supportÃ© par le navigateur 
	   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest..."); 
	   return; 
	} 
	 
	xhr_object.open(method, filename, true);
	
	xhr_object.onreadystatechange = function() 
		 { 
		 	 if(xhr_object.readyState == 4) 
			 { 
	 			 var responce = xhr_object.responseText;
	 			 alert(responce);
			 } 
	   } 
	 
	
	if(method == "POST") 
	   xhr_object.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
	   

	xhr_object.send(params); 
}	

