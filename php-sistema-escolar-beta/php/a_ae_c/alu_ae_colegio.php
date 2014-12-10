<?php
	require_once("../php_default.php");
	$query="select * from colegio where idcol=".$_REQUEST['id_col'];
   	$result=mysql_query($query, $link) or die(mysql_error());
   	$row=mysql_fetch_row($result);	

	$query="select ae.* from ae_colegio aec,anio_escolar ae 
				where aec.idanio=ae.idanio and idcol=".$_REQUEST['id_col']." order by 1";
	$result2=mysql_query($query, $link) or die(mysql_error());
	$totEmp2=mysql_num_rows($result2);	

	$query="select * from alu_ae_colegio where idcol=".$_REQUEST['id_col'];
	$resultcol=mysql_query($query, $link) or die(mysql_error());
	$totcol=mysql_num_rows($resultcol);	

	$totcol = $totcol + $totEmp2;	
?>
<!DOCTYPE HTML>
<html>		
	<head>
		<title>Alumnos/Colegio</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_alu_ae_colegio.css" media="screen"/>	
	</head>
	<body>
		<div class="DivGeneral">
			<!---->
			<div class="DivTitulo">
				<a href="../c/colegio.php" id="linkAtras">Atras</a>
				<strong>Registro de Alumnos/Colegio</strong>							
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
					echo "<td></td>";						
					echo "<td colspan=2>Identificacion</td>";
					echo "<td>Nombre y Apellido</td>";
					echo "<td></td>";
					echo "</tr>";		

					echo "<tr>";
					echo "<td rowspan=".($totcol+1).">".$row[0]."</td>";
					echo "<td rowspan=".($totcol+1).">".$row[1]."</td>";
					echo "</tr>";		
						
					if ($totEmp2>0){														
						while ($rowEmp2 = mysql_fetch_assoc($result2)){
							$query="select * from alu_ae_colegio where idcol=".$row[0]." and idanio=".$rowEmp2['idanio'];								
							$result3=mysql_query($query, $link) or die(mysql_error());
							$totcol2=mysql_num_rows($result3);							
									
							echo "<tr>";
							echo "<td rowspan=".($totcol2+1).">".$rowEmp2['idanio']."</td>";
							echo "<td rowspan=".($totcol2+1).">".$rowEmp2['nomanio']."</td>";
							echo "<td rowspan=".($totcol2+1)."><a href='alu_ae_colegio_f_agrega.php?id_col=$row[0]&id_anio=$rowEmp2[idanio]' id='linkAgrega'>Agregar</a></td>";							
							echo "</tr>";

							$query="select ui.* from usuario_info ui,alu_ae_colegio aec 
										where idusu=idalu and idcol=".$_REQUEST['id_col']." and idanio=".$rowEmp2['idanio'];
							$result4=mysql_query($query, $link) or die(mysql_error());
							$totEmp4=mysql_num_rows($result4);	

							if ($totEmp4>0){														
								while ($rowEmp4= mysql_fetch_assoc($result4)){
									echo "<tr>";
									echo "<td>".$rowEmp4['tipoid']."</td>";
									echo "<td>".$rowEmp4['numid']."</td>";
									echo "<td>".$rowEmp4['nomusu']." ".$rowEmp4['apeusu']."</td>";
									echo "<td>"."<a href='alu_ae_colegio_f_borra.php?id_col=$row[0]&id_anio=$rowEmp2[idanio]&id_alu=$rowEmp4[idusu]' id='LinkBorra'>Borrar</a></td>";																					
									echo "</tr>";
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
