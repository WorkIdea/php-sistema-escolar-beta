/*************************************************************************************************/
function ValidaForma(){
	//document.getElementById("idrep").disabled = true;
	alert("...");
	
	/*document.getElementById("numid").autocomplete = "off";
	document.getElementById("numid").value = null;
	document.getElementById("numid").maxLength = 14;

	document.getElementById("nomusu").autocomplete = "off";
	document.getElementById("nomusu").value = null;	
	document.getElementById("nomusu").maxLength = 50;

	document.getElementById("apeusu").autocomplete = "off";
	document.getElementById("apeusu").value = null;	
	document.getElementById("apeusu").maxLength = 50;	

	document.getElementById("direcusu").autocomplete = "off";
	document.getElementById("direcusu").value = null;	
	document.getElementById("direcusu").maxLength = 50;	

	document.getElementById("numid").focus();	*/
}
function ValidaFormaEdita(){
	document.getElementById("idrep").disabled = true;
	document.getElementById("tipoid").disabled = true;
	document.getElementById("numid").disabled = true;
	document.getElementById("nomusu").disabled = true;

	/*document.getElementById("nomusu").autocomplete = "off";	
	document.getElementById("nomusu").maxLength = 50;	

	document.getElementById("apeusu").autocomplete = "off";	
	document.getElementById("apeusu").maxLength = 50;*/

	/*document.getElementById("direcusu").autocomplete = "off";
	document.getElementById("direcusu").maxLength = 50;		

	document.getElementById("nomusu").focus();	*/
}
function ValidaCampos(){
	var vTipoid = trim(document.getElementById("idalu").value);	
	/*var vNumid = trim(document.getElementById("numid").value);	
	var vNombre = trim(document.getElementById("nomusu").value);	
	var vApellido = trim(document.getElementById("apeusu").value);
	var vDireccion = trim(document.getElementById("direcusu").value);*/
	var iValida = true;		
	
	document.getElementById("idrep").disabled = false;
	document.getElementById("idalu").disabled = false;
	if (vTipoid == "-"){
		alert("Selecione un alumno");
		document.getElementById("idalu").focus();
	  	iValida = false;  		
	}
	/*if (iValida == true){
		if (vNumid == null|| vNumid.length == 0 || /^\s+$/.test(vNumid)){
			alert("Ingrese numero de identificacion del usuario");
			document.getElementById("numid").focus();
	  		iValida = false;  
		}
	}		
	if (iValida == true){
		if(vNombre == null || vNombre.length == 0 || /^\s+$/.test(vNombre)) {
			alert("Ingrese nombre del usuario");
			document.getElementById("nomusu").focus();
	  		iValida = false;
		}
	}
	if (iValida == true){
		if(vApellido == null || vApellido.length == 0 || /^\s+$/.test(vApellido)) {
			alert("Ingrese apellido del usuario");
			document.getElementById("apeusu").focus();
			iValida = false;
		}
	}
	if (iValida == true){
		if(vDireccion == null || vDireccion.length == 0 || /^\s+$/.test(vDireccion)) {
			alert("Ingrese direccion del usuario");
			document.getElementById("direcusu").focus();
			iValida = false;
		}
	}	*/	
	return iValida;
	document.getElementById("idarep").disabled = true;	
	document.getElementById("idalu").disabled = true;	
}
/*************************************************************************************************/