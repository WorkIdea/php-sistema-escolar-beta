/*************************************************************************************************/
function ValidaForma(){
	//document.getElementById("idcol").disabled = true;
	//document.getElementById("idanio").disabled = true;
}
function ValidaFormaEdita(){
	document.getElementById("idusu").disabled = true;
	document.getElementById("tipoid").disabled = true;
	document.getElementById("numid").disabled = true;
	document.getElementById("nomusu").disabled = true;	
}
function ValidaCampos(){
	var vROLusu = trim(document.getElementById("rolusu").value);
	var iValida = true;		

	document.getElementById("idusu").disabled = false;
	//document.getElementById("idani").disabled = false;	
	if (vROLusu == "-"){
		alert("Selecione rol de usuario valido");
		//document.getElementById("tipoid").focus();
	  	iValida = false;  		
	}	
	return iValida;
	document.getElementById("idusu").disabled = true;
	//document.getElementById("idanio").disabled = true;	
}
/*************************************************************************************************/