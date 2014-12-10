/*************************************************************************************************/
function ValidaForma(){
	document.getElementById("idanio").disabled = true;
	document.getElementById("nomanio").autocomplete = "off"
	document.getElementById("nomanio").value = null;	
	document.getElementById("nomanio").maxLength = 50;
	document.getElementById("nomanio").focus();
}
function ValidaFormaEdita(){
	document.getElementById("idanio").disabled = true;
	document.getElementById("nomanio").autocomplete = "off"
	document.getElementById("nomanio").maxLength = 50;
	document.getElementById("nomanio").focus();
}
function ValidaCampos(){
	var vNombre = trim(document.getElementById("nomanio").value);
	var iValida = true;		

	document.getElementById("idanio").disabled = false;	
	if(vNombre == null || vNombre.length == 0 || /^\s+$/.test(vNombre)) {
		alert("Ingrese nombre del año escolar");
		document.getElementById("nomanio").focus();
	  	iValida = false;
	}		
	return iValida;
	document.getElementById("idanio").disabled = true;	
}
/*************************************************************************************************/