<?php   
	require_once("../../../pdf/lib/class.ezpdf.php"); 
	$pdf = new Cezpdf('A4'); //seleccionamos tipo de hoja
	$pdf->selectFont('../../../pdf/lib/fonts/Helvetica.afm'); //seleccionamos fuente a utiliza
	/*============================================================================================*/
	$pdf->ezText("Reporte Lista de Estudiantes"."\n", 20);
	
	require_once("../../php_default.php");
		$query="select * from asignatura where idasig=".$_REQUEST['id_asig'];
		$result=mysql_query($query, $link) or die(mysql_error());
		$row=mysql_fetch_row($result);									
	
		$pdf->ezText("Datos de Asignatura"."\n", 14);
		$pdf->ezText("Nombre: ".$row[1]."\n\n\n", 14);
		$pdf->ezText("Lista de Alumnos"."\n", 14);

	require_once("../../php_default.php");
		$query="select * from alu_ae_colegio where idcol=$_REQUEST[id_col] and idanio=$_REQUEST[id_anio]";
		$result=mysql_query($query, $link) or die(mysql_error());
		$totEmp=mysql_num_rows($result);								
					
		while ($rowEmp = mysql_fetch_assoc($result)){							
			$query="select * from usuario_info where idusu=".$rowEmp['idalu'];
			$result2=mysql_query($query, $link) or die(mysql_error());
			$row2=mysql_fetch_row($result2);							

			$data[]=array('TIPOID'=>$row2[1], 'NUMID'=>$row2[2],'Nombre'=>$row2[3],'Apellido'=>$row2[4]);
		}								

	$pdf->ezTable($data);
    $pdf->ezText("\n\n\n\n\nFecha: ".date("d/m/Y")."", 10);
    $pdf->ezText("Hora: ".date("H:i:s")."\n\n", 10);
    $pdf->ezStream();	
?>