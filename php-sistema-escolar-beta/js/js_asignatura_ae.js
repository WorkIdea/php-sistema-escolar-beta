/*************************************************************************************************/
function ValidaForma(){
	document.getElementById("idanio").disabled = true;
	document.getElementById("idasig").disabled = true;
}
function ValidaFormaEdita(){
	document.getElementById("idanio").disabled = true;
	document.getElementById("nomanio").disabled = true;	
}
function ValidaCampos(){
	var vIDAsig = trim(document.getElementById("idasig").value);
	var iValida = true;		

	document.getElementById("idanio").disabled = false;
	document.getElementById("idasig").disabled = false;	
	if (vIDAsig == "-"){
		alert("Selecione asignatura valida");
		//document.getElementById("tipoid").focus();
	  	iValida = false;  		
	}	
	return iValida;
	document.getElementById("idanio").disabled = true;
	document.getElementById("idasig").disabled = true;	
}
/*************************************************************************************************/