<?php   
	require_once("../../../pdf/lib/class.ezpdf.php"); 
	$pdf = new Cezpdf('A4'); //seleccionamos tipo de hoja
	$pdf->selectFont('../../../pdf/lib/fonts/Helvetica.afm'); //seleccionamos fuente a utiliza
	/*============================================================================================*/	
	$pdf->ezText("Reporte de Asistencia"."\n", 20);
	require_once("../../php_default.php");

		$query="select * from usuario_info where idusu=".$_REQUEST['id_doc'];		
		$result=mysql_query($query, $link) or die(mysql_error());
		$row=mysql_fetch_row($result);									

		$query="select * from colegio where idcol=".$_REQUEST['id_col'];
		$result2=mysql_query($query, $link) or die(mysql_error());
		$row2=mysql_fetch_row($result2);		

		$query="select * from asignatura where idasig=".$_REQUEST['id_asig'];
		$result0=mysql_query($query, $link) or die(mysql_error());
		$row0=mysql_fetch_row($result0);			
	
		$pdf->ezText("Datos del Docente"."\n", 14);
		$pdf->ezText("Identificacion: ".$row[1]." - ".$row[2]."\n", 14);
		$pdf->ezText("Nombre: ".$row[3]." ".$row[4]."\n", 14);
		$pdf->ezText("Nombre del Colegio: ".$row2[1]."\n", 14);
		$pdf->ezText("Nombre de Asignatura: ".$row0[1]."\n", 14);
		$pdf->ezText("Asistencia del dia: ".$_REQUEST['id_fecha']."\n", 14);


				require_once("../../php_default.php");
					$query="select a.idalu,b.tipoid,b.numid,b.nomusu,b.apeusu,a.asistio,a.dia from asisten_asig_alu a,usuario_info b 
							where a.idalu=b.idusu
							and idasig=$_REQUEST[id_asig] 
							and dia='$_REQUEST[id_fecha]'
							and idalu in(select idalu from alu_ae_colegio 
											where idcol=$_REQUEST[id_col]
											and idanio=$_REQUEST[id_anio])";
					$result=mysql_query($query, $link) or die(mysql_error());
					$totEmp=mysql_num_rows($result);

						while ($rowEmp = mysql_fetch_assoc($result)){	
								if ($rowEmp['asistio']=='Z'){
									$rowEmp['asistio'] = 'N/A';
								}

								$data[]=array('Nombre'=>$rowEmp['nomusu']." ".$rowEmp['apeusu'],'Asistio'=>$rowEmp['asistio']);						
						}		
	/*============================================================================================*/
	$pdf->ezTable($data);
    $pdf->ezText("\n\n\n\n\nFecha: ".date("d/m/Y")."", 10);
    $pdf->ezText("Hora: ".date("H:i:s")."\n\n", 10);
    $pdf->ezStream();
?>	