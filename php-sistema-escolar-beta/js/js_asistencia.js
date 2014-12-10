function ValidaCampos(){
	opciones = document.getElementsByName("asist");
	 
	var seleccionado = false;
	for(var i=0; i<opciones.length; i++) {    
	  if(opciones[i].checked) {
	    seleccionado = true;
	    break;
	  }
	}
	 
	if(!seleccionado) {
		alert("Seleccione un valor");
	  return false;
	}	
}