/*************************************************************************************************/
function ValidaForma(){
	document.getElementById("numid").value = null;
	document.getElementById("passusu").value = null;	

	document.getElementById("numid").autocomplete = "off";
	document.getElementById("passusu").autocomplete = "off";

	document.getElementById("numid").maxLength = 14;
	document.getElementById("passusu").maxLength = 50;

	document.getElementById("numid").focus();	
}
function ValidaCampos(){
	var vTipoid = trim(document.getElementById("tipoid").value);
	var vNumid = trim(document.getElementById("numid").value);	
	var vPassusu = trim(document.getElementById("passusu").value);	
	var iValida = true;		

	if (vTipoid == "-"){
		alert("Selecione tipo de identificacion");		
	  	iValida = false;  		
	}	
	//document.getElementById("codrep").disabled = false;
	if (iValida == true){
		if (vNumid == null|| vNumid.length == 0 || /^\s+$/.test(vNumid)){
			alert("Ingrese numero de Identificacion");
			document.getElementById("numid").focus();
	  		iValida = false;  
		}
	}		
	if (iValida == true){
		if(vPassusu== null || vPassusu.length == 0 || /^\s+$/.test(vPassusu)) {
			alert("Ingrese Contraseña");
			document.getElementById("passusu").focus();
	  		iValida = false;
		}
	}
	return iValida;
	//document.getElementById("codrep").disabled = true;
}
/*************************************************************************************************/