/*************************************************************************************************/
function ValidaForma(){
	/*document.getElementById("idcol").disabled = true;
	document.getElementById("idanio").disabled = true;*/
}
function ValidaFormaEdita(){
	document.getElementById("idcol").disabled = true;
	document.getElementById("nomcol").disabled = true;	
}
function ValidaCampos(){
	var vIDusurep = trim(document.getElementById("idusu").value);
	var iValida = true;		

	document.getElementById("idcol").disabled = false;
	document.getElementById("idusu").disabled = false;	
	if (vIDusurep == "-"){
		alert("Selecione representante valido");
		//document.getElementById("tipoid").focus();
	  	iValida = false;  		
	}	
	return iValida;
	document.getElementById("idcol").disabled = true;
	document.getElementById("idusu").disabled = true;	
}
/*************************************************************************************************/