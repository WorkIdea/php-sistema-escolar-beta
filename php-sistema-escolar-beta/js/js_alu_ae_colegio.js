/*************************************************************************************************/
function ValidaForma(){
	document.getElementById("idcol").disabled = true;
	document.getElementById("idanio").disabled = true;
}
function ValidaFormaEdita(){
	document.getElementById("idcol").disabled = true;
	document.getElementById("nomcol").disabled = true;	
	document.getElementById("idanio").disabled = true;
	document.getElementById("nomanio").disabled = true;
}
function ValidaCampos(){
	var vIDAlu = trim(document.getElementById("idalu").value);
	var iValida = true;		

	document.getElementById("idcol").disabled = false;
	document.getElementById("idanio").disabled = false;	
	if (vIDAlu == "-"){
		alert("Selecione alumno");
		//document.getElementById("tipoid").focus();
	  	iValida = false;  		
	}	
	return iValida;
	document.getElementById("idcol").disabled = true;
	document.getElementById("idanio").disabled = true;
}
/*************************************************************************************************/