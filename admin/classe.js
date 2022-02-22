function requete(lettre)
{

 var params = null;
 var xhr_object = null; 
 var method = "POST";
 var filename = "requete2.php";

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
		 			 document.getElementById('traceroute').innerHTML = xhr_object.responseText;
				 } 
			 } 
			 
			 if(method == "POST") 
	   xhr_object.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
	   
			 xhr_object.send(null);
			 
			 }
			 
			
			  /* fonction inArray, renvoie true si la valeur recherchÃ©e est dans le tableau*/
 Array.prototype.inArray = function(array) {
 for(var i=0; i<this.length;i++) {
 if(this[i]==array){ return true;}
 }
 return false;
 };
 /* Fonction affichant et masquant un Ã©lÃ©ment */
 function ShowHide(element){
 if(element.style.display=='none'){
 element.style.display='';
 }else{
 element.style.display='none';
 }
 }

 function classe(className){
 var elts = document.getElementsByTagName('tbody');
 for (var j=0;j<elts.length;j++) {
 if (elts[j].getAttribute('class') && elts[j].getAttribute('class').split(' ').inArray(className)) {
 ShowHide(elts[j]);
 }
 }
 }

