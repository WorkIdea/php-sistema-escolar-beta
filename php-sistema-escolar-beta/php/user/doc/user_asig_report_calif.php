<?php   
	require_once("../../../pdf/lib/class.ezpdf.php"); 
	$pdf = new Cezpdf('A4'); //seleccionamos tipo de hoja
	$pdf->selectFont('../../../pdf/lib/fonts/Helvetica.afm'); //seleccionamos fuente a utiliza
	/*============================================================================================*/	
	$pdf->ezText("Reporte de Calificaciones"."\n", 20);
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
		$pdf->ezText("Calificaciones"."\n", 14);

		$query="select * from alu_ae_colegio where idcol=$_REQUEST[id_col] and idanio=$_REQUEST[id_anio]";
		//$pdf->ezText($query."\n\n", 10);
		$result3=mysql_query($query, $link) or die(mysql_error());
		$totEmp=mysql_num_rows($result3);

		while ($rowEmp = mysql_fetch_assoc($result3)){
			$query="select * from usuario_info where idusu=".$rowEmp['idalu'];
			$result4=mysql_query($query, $link) or die(mysql_error());
			$row4=mysql_fetch_row($result4);							

			$query="select * from calif_asig_alu_lapso where idalu=$rowEmp[idalu] and idasig=$_REQUEST[id_asig]";
			$result5=mysql_query($query, $link) or die(mysql_error());
			//$row5=mysql_fetch_row($result5);

							$totEmp2=mysql_num_rows($result5);

							$lap1="";
							$lap2="";
							$lap3="";

							if ($totEmp2>0) {
								while ($rowEmp2 = mysql_fetch_assoc($result5)){
									if ($rowEmp2['idlap'] == 1){
										$lap1=$rowEmp2['calif'];
									}
									elseif ($rowEmp2['idlap'] == 2) {
										$lap2=$rowEmp2['calif'];
									}
									else{
										$lap3=$rowEmp2['calif'];
									}									
								}
							}
							$def =(($lap1+$lap2+$lap3)/3);
							$def2 = number_format($def,2,".",","); 			
	
			$data[]=array('Identificacion'=>$row4[1].$row4[2],'Nombre'=>$row4[3]." ".$row4[4], 'Lapso 1'=>$lap1, 'Lapso 2'=>$lap2, 'Lapso 3'=>$lap3,'Definitiva'=>$def2);							
		}			
	/*============================================================================================*/
	$pdf->ezTable($data);
    $pdf->ezText("\n\n\n\n\nFecha: ".date("d/m/Y")."", 10);
    $pdf->ezText("Hora: ".date("H:i:s")."\n\n", 10);
    $pdf->ezStream();
?>	