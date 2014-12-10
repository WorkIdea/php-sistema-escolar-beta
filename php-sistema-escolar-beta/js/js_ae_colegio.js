/*************************************************************************************************/
function ValidaForma(){
	document.getElementById("idcol").disabled = true;
	document.getElementById("idanio").disabled = true;
}
function ValidaFormaEdita(){
	document.getElementById("idcol").disabled = true;
	document.getElementById("nomcol").disabled = true;	
}
function ValidaCampos(){
	var vIDAnio = trim(document.getElementById("idanio").value);
	var iValida = true;		

	document.getElementById("idcol").disabled = false;
	document.getElementById("idanio").disabled = false;	
	if (vIDAnio == "-"){
		alert("Selecione año escolar valido");
		//document.getElementById("tipoid").focus();
	  	iValida = false;  		
	}	
	return iValida;
	document.getElementById("idcol").disabled = true;
	document.getElementById("idanio").disabled = true;	
}
/*************************************************************************************************/