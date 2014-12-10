<?php    
    require_once("lib/class.ezpdf.php");  
	$pdf = new Cezpdf('A4'); //seleccionamos tipo de hoja
	$pdf->selectFont('lib/fonts/Helvetica.afm'); //seleccionamos fuente a utiliza
/*============================================================================================*/
	$bd_host = "localhost"; //conexión localhost
    $bd_usuario = "root";  //nombre usuario
    $bd_password = ""; //contraseña
    $bd_base = "system_info"; //nombre Base de Datos
        //Hacemos la conexión y si no  mostramos error
    $con = mysql_connect($bd_host, $bd_usuario, $bd_password) or die("Error con la conexión");
        //Seleccionamos la Base de Datos de nuestra consulta anterior.
    mysql_select_db($bd_base, $con) or die("Error al seleccionar db");
        //escribimos nuestra consulta
    $sql="SELECT idcol,nomcol,direcol FROM colegio";
        //realizamos nuestra consulta
    $resSql=mysql_query($sql) or die("<br>Error consulta</br>".mysql_error());
/*============================================================================================*/
    $pdf->ezText("Reporte por Colegios"."\n", 20);

        while($row=mysql_fetch_row($resSql)){
            //la estructura será 'Nombre campo'=> posición del arreglo y la información
            $data[]=array('ID'=>$row[0], 'Nombre del colegio'=>$row[1],'Direccion del colegio'=>$row[2]);
        }
		//$titles=array('Id'=>'Id', 'Nombre'=>'Nombre','Paterno'=>'Paterno','Materno'=>'Materno');
/*============================================================================================*/
    $pdf->ezTable($data);
    $pdf->ezText("\n\n\n\n\nFecha: ".date("d/m/Y")."", 10);
    $pdf->ezText("Hora: ".date("H:i:s")."\n\n", 10);
    $pdf->ezStream();  
?>