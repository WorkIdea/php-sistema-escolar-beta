<?php   
	require_once("../../../pdf/lib/class.ezpdf.php"); 
	$pdf = new Cezpdf('A4'); //seleccionamos tipo de hoja
	$pdf->selectFont('../../../pdf/lib/fonts/Helvetica.afm'); //seleccionamos fuente a utiliza
	/*============================================================================================*/
	
	$pdf->ezText("Reporte de Calificaciones"."\n", 20);
	
	require_once("../../php_default.php");

		$query="select * from usuario_info where idusu=".$_REQUEST['id_alu'];		
		$result=mysql_query($query, $link) or die(mysql_error());
		$row=mysql_fetch_row($result);									


		$query="select * from colegio where idcol=".$_REQUEST['id_col'];
		$result2=mysql_query($query, $link) or die(mysql_error());
		$row2=mysql_fetch_row($result2);		
	
		$pdf->ezText("Datos del Alumno"."\n", 14);
		$pdf->ezText("Identificacion: ".$row[1]." - ".$row[2]."\n", 14);
		$pdf->ezText("Nombre: ".$row[3]." ".$row[4]."\n", 14);
		$pdf->ezText("Nombre del Colegio: ".$row2[1]."\n\n", 14);
		$pdf->ezText("Calificaciones"."\n", 14);

/**/

					$query="select * from asignatura
								where idasig in (select distinct idasig from calif_asig_alu_lapso
													where idalu=".$_REQUEST['id_alu'].")";

					$result=mysql_query($query, $link) or die(mysql_error());
					$totEmp=mysql_num_rows($result);										
					
					//if ($totEmp>0) {
						/*echo "<table>";	
						echo "<tr>";
						echo "<th>Asignatura</th>";
						echo "<th>Lapso 1</th>";
						echo "<th>Lapso 2</th>";
						echo "<th>Lapso 3</th>";
						echo "<th>Definitiva</th>";
						echo "</tr>";		*/										
						while ($rowEmp = mysql_fetch_assoc($result)){
							$query="select * from calif_asig_alu_lapso where idalu=$_REQUEST[id_alu] and idasig=$rowEmp[idasig]";
							$result5=mysql_query($query, $link) or die(mysql_error());
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

							$data[]=array('Asignatura'=>$rowEmp['nomasig'], 'Lapso 1'=>$lap1,'Lapso 2'=>$lap2,'Lapso 3'=>$lap3,'Definitiva'=>$def2);
							/*echo "<tr>";
								echo "<td>".$rowEmp['nomasig']."</td>";
								echo "<td>$lap1</td>";
								echo "<td>$lap2</td>";
								echo "<td>$lap3</td>";								
								echo "<td>$def2</td>";	
							echo "</tr>";	*/	
						}
/**/







	/*$query="select a.nomasig,b.calif from asignatura a,calif_asig_alu b
				where a.idasig=b.idasig
				and b.idalu=".$_REQUEST['id_alu'];*/

	/*$result=mysql_query($query, $link) or die(mysql_error());
	$totEmp=mysql_num_rows($result);	*/							
					
	/*if ($totEmp>0) {
		while ($rowEmp = mysql_fetch_assoc($result)){
			$data[]=array('Asignatura'=>$rowEmp['nomasig'], 'Calificacion'=>$rowEmp['calif']);
		}	
	}	*/
	
	/*============================================================================================*/
	$pdf->ezTable($data);
    $pdf->ezText("\n\n\n\n\nFecha: ".date("d/m/Y")."", 10);
    $pdf->ezText("Hora: ".date("H:i:s")."\n\n", 10);
    $pdf->ezStream();
?>