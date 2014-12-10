/*************************************************************************************************/
function ValidaForma(){
	document.getElementById("idasig").disabled = true;
	document.getElementById("nomasig").autocomplete = "off"
	document.getElementById("nomasig").value = null;	
	document.getElementById("nomasig").maxLength = 50;
	document.getElementById("nomasig").focus();
}
function ValidaFormaEdita(){
	document.getElementById("idasig").disabled = true;
	document.getElementById("nomasig").autocomplete = "off"
	document.getElementById("nomasig").maxLength = 50;
	document.getElementById("nomasig").focus();
}
function ValidaCampos(){
	var vNombre = trim(document.getElementById("nomasig").value);
	var iValida = true;		

	document.getElementById("idasig").disabled = false;	
	if(vNombre == null || vNombre.length == 0 || /^\s+$/.test(vNombre)) {
		alert("Ingrese nombre de asignatura");
		document.getElementById("nomasig").focus();
	  	iValida = false;
	}		
	return iValida;
	document.getElementById("idasig").disabled = true;
}
/*************************************************************************************************/