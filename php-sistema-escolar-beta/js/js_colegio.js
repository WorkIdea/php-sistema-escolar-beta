/*************************************************************************************************/
function ValidaForma(){
	document.getElementById("idcol").disabled = true;
	
	document.getElementById("nomcol").autocomplete = "off";
	document.getElementById("nomcol").value = null;	
	document.getElementById("nomcol").maxLength = 50;

	document.getElementById("direcol").autocomplete = "off";
	document.getElementById("direcol").value = null;	
	document.getElementById("direcol").maxLength = 50;

	document.getElementById("nomcol").focus();
}
function ValidaFormaEdita(){
	document.getElementById("idcol").disabled = true;
	document.getElementById("nomcol").autocomplete = "off";
	document.getElementById("nomcol").maxLength = 50;

	document.getElementById("direcol").autocomplete = "off";
	document.getElementById("direcol").maxLength = 50;

	document.getElementById("nomcol").focus();
}
function ValidaCampos(){
	var vNombre = trim(document.getElementById("nomcol").value);
	var vDireccion = trim(document.getElementById("direcol").value);
	var iValida = true;		

	document.getElementById("idcol").disabled = false;	
	if(vNombre == null || vNombre.length == 0 || /^\s+$/.test(vNombre)){
		alert("Ingrese nombre del colegio");
		document.getElementById("nomcol").focus();
	  	iValida = false;
	}
	if (iValida==true){
		if(vDireccion == null || vDireccion.length == 0 || /^\s+$/.test(vDireccion)){
			alert("Ingrese direccion del colegio");
			document.getElementById("direcol").focus();
		  	iValida = false;
		}		
	}			
	return iValida;
	document.getElementById("idcol").disabled = true;
}
/*************************************************************************************************/