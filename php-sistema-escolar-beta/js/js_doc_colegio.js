/*************************************************************************************************/
function ValidaForma(){
	/*document.getElementById("idcol").disabled = true;
	document.getElementById("idanio").disabled = true;*/
}
function ValidaFormaEdita(){
	document.getElementById("idcol").disabled = true;
	document.getElementById("nomcol").disabled = true;	
	document.getElementById("idanio").disabled = true;
	document.getElementById("nomanio").disabled = true;	
}
function ValidaCampos(){
	var vIDasig = trim(document.getElementById("idasig").value);
	var vIDdoc = trim(document.getElementById("iddoc").value);
	var iValida = true;		

	document.getElementById("idcol").disabled = false;
	document.getElementById("idanio").disabled = false;	
	document.getElementById("idasig").disabled = false;	
	document.getElementById("iddoc").disabled = false;	
	if (vIDasig == "-"){
		alert("Selecione asignatura valida");
	  	iValida = false;  		
	}	
	if (iValida == true){
		if (vIDdoc == "-"){
			alert("Selecione docente");
		  	iValida = false;  		
		}		
	}
	return iValida;
	document.getElementById("idcol").disabled = true;
	document.getElementById("idanio").disabled = true;	
	document.getElementById("idasig").disabled = true;	
	document.getElementById("iddoc").disabled = true;		
}
/*************************************************************************************************/