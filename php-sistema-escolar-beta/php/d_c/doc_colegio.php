<?php
	require_once("../php_default.php");
	$query="select * from colegio where idcol=".$_REQUEST['id_col'];
   	$result=mysql_query($query, $link) or die(mysql_error());
   	$row=mysql_fetch_row($result);

	$query="select ae.* from anio_escolar ae, ae_colegio aec where 
				ae.idanio=aec.idanio and idcol=".$_REQUEST['id_col']." order by 1";
	$result2=mysql_query($query, $link) or die(mysql_error());
	$totEmp2=mysql_num_rows($result2);
	$count_asig=0;

	if ($totEmp2>0){														
		while ($rowEmp22 = mysql_fetch_assoc($result2)){
			$query="select * from asignatura_ae where idanio=".$rowEmp22['idanio'];
			$result22=mysql_query($query, $link) or die(mysql_error());
			$totEmp22=mysql_num_rows($result22);	
			$count_asig = $count_asig + $totEmp22;
		}							
	}	
	$query="select * from doc_asig_ae_colegio where idcol=".$_REQUEST['id_col'];
	$resultcol=mysql_query($query, $link) or die(mysql_error());
	$totcol=mysql_num_rows($resultcol);	

	$totcol = $totEmp2 + $count_asig;
?>
<!DOCTYPE HTML>
<html>		
	<head>
		<title>Docentes/Colegio</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_doc_colegio.css" media="screen"/>		
	</head>
	<body>
		<div class="DivGeneral">
			<!---->
			<div class="DivTitulo">
				<a href="../c/colegio.php" id="linkAtras">Atras</a>
				<strong>Registro de Docentes/Colegio</strong>							
			</div>
			<!---->			
			<div class="DivPanelData">												
				<?php
					echo "<table border=1>";

					echo "<tr>";
					echo "<td>ID</td>";
					echo "<td>Colegio</td>";
					echo "<td>ID</td>";
					echo "<td>Anio Escolar</td>";
					echo "<td>ID</td>";
					echo "<td>Asignatura</td>";
					echo "<td></td>";
					echo "<td colspan=2>Identificacion</td>";
					echo "<td>Nombre y Apellido</td>";
					echo "<td></td>";
					echo "</tr>";

					echo "<tr>";
					echo "<td rowspan=".($totcol+1).">".$row[0]."</td>";
					echo "<td rowspan=".($totcol+1).">".$row[1]."</td>";
					echo "</tr>";	

					$query="select ae.* from anio_escolar ae, ae_colegio aec 
								where ae.idanio=aec.idanio and idcol=".$_REQUEST['id_col']." order by 1";
					$result22=mysql_query($query, $link) or die(mysql_error());
					$totEmp22=mysql_num_rows($result22);

					if ($totEmp2>0){																									
						while ($rowEmp2 = mysql_fetch_assoc($result22)){
							$query="select * from asignatura a,asignatura_ae ae where a.idasig=ae.idasig and idanio=".$rowEmp2['idanio']." order by 1";							
							$result33=mysql_query($query, $link) or die(mysql_error());
							$totEmp33=mysql_num_rows($result33);																							
									
							echo "<tr>";
							echo "<td rowspan=".($totEmp33+1).">".$rowEmp2['idanio']."</td>";
							echo "<td rowspan=".($totEmp33+1).">".$rowEmp2['nomanio']."</td>";
							echo "</tr>";						

							if ($totEmp33>0){									
								$count = 0;
								while ($rowEmp3 = mysql_fetch_assoc($result33)){
									echo "<tr>";
									echo "<td>".$rowEmp3['idasig']."</td>";
									echo "<td>".$rowEmp3['nomasig']."</td>";

									if ($count == 0){
										echo "<td rowspan=".($totEmp33+1-1)."><a href='doc_colegio_f_agrega.php?id_col=$_REQUEST[id_col]&id_anio=$rowEmp2[idanio]' id='linkAgrega'>Agregar</a></td>";
									}

									$query="select ui.* from usuario_info ui,doc_asig_ae_colegio  daec
												where ui.idusu=daec.iddoc
												and idcol=".$_REQUEST['id_col']." 
												and idanio=".$rowEmp2['idanio']."
												and idasig=".$rowEmp3['idasig'];																					
									$result4=mysql_query($query, $link) or die(mysql_error());
									$totEmp4=mysql_num_rows($result4);	

									
									if ($totEmp4>0) {
										while ($rowEmp4 = mysql_fetch_assoc($result4)){									
											echo "<td>".$rowEmp4['tipoid']."</td>";
											echo "<td>".$rowEmp4['numid']."</td>";											
											echo "<td>".$rowEmp4['nomusu']." ".$rowEmp4['apeusu']."</td>";	
											echo "<td><a href='doc_colegio_f_borra.php?id_col=$_REQUEST[id_col]&id_anio=$rowEmp2[idanio]&id_asig=$rowEmp3[idasig]&id_doc=$rowEmp4[idusu]' id='LinkBorra'>Borrar</a></td>";
										}										
									}
									echo "</tr>";														
									$count++;	
								}																	
							}																														
						}							
					}
					echo "</table>";										
				?>
			</div>
		<!---->						
		</div>
	</body>		
</html>