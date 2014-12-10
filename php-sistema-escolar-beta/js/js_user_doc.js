/*************************************************************************************************/
function ValidaFormaEdita(){
	document.getElementById("calif1").autocomplete = "off";
	document.getElementById("calif1").maxLength = 2;		
	document.getElementById("calif1").focus();

	document.getElementById("calif2").autocomplete = "off";
	document.getElementById("calif2").maxLength = 2;		

	document.getElementById("calif3").autocomplete = "off";
	document.getElementById("calif3").maxLength = 2;			
}
function ValidaCampos(){	
	var vCalif = trim(document.getElementById("calif1").value);
	var vCalif2 = trim(document.getElementById("calif2").value);
	var vCalif3 = trim(document.getElementById("calif3").value);

	var iValida = true;		

	if (vCalif == null|| vCalif.length == 0 || /^\s+$/.test(vCalif)){
		alert("Ingrese Calificacion (1)");
		document.getElementById("calif1").focus();
	  	iValida = false;  
	}else{
		if (vCalif>20 || vCalif < 0){
			alert("Ingrese Calificacion valida (1)");
			document.getElementById("calif1").focus();
	  		iValida = false;  
		}else{

			if (vCalif2 == null|| vCalif2.length == 0 || /^\s+$/.test(vCalif2)){
				alert("Ingrese Calificacion (2)");
				document.getElementById("calif2").focus();
			  	iValida = false;  
			}else{
				if (vCalif2>20 || vCalif2 < 0){
					alert("Ingrese Calificacion valida (2)");
					document.getElementById("calif2").focus();
			  		iValida = false;  
				}else{

					if (vCalif3 == null|| vCalif3.length == 0 || /^\s+$/.test(vCalif3)){
						alert("Ingrese Calificacion (3)");
						document.getElementById("calif3").focus();
					  	iValida = false;  
					}else{
						if (vCalif3>20 || vCalif3 < 0){
							alert("Ingrese Calificacion valida (3)");
							document.getElementById("calif3").focus();
					  		iValida = false;  
						}
					}					
				}
			}			
		}
	}	

	return iValida;
}
/*************************************************************************************************/