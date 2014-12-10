<?php
	require_once("../php_default.php");
	$query="select * from colegio where idcol=".$_REQUEST['id_col'];
   	$result=mysql_query($query, $link) or die(mysql_error());
   	$totEmp=mysql_num_rows($result);  	
?>
<!DOCTYPE HTML>
<html>		
	<head>
		<title>Años Escolares/Colegio</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_ae_colegio.css" media="screen"/>
	</head>
	<body>
		<div class="DivGeneral">
			<!---->
			<div class="DivTitulo">
				<a href="../c/colegio.php" id="linkAtras">Atras</a>
				<strong>Registro de Años Escolares/Colegio</strong>							
			</div>
			<!---->			
			<div class="DivPanelData">						
				<?php
					if ($totEmp>0){
						echo "<table border=1>";
						echo "<tr>";
						echo "<td>ID</td>";
						echo "<td>Colegio</td>";
						echo "<td></td>";
						echo "<td>ID</td>";
						echo "<td>Año Escolar</td>";
						echo "<td></td>";
						echo "</tr>";
						while ($rowEmp = mysql_fetch_assoc($result)){									
						 	$query="select * from ae_colegio where idcol=".$rowEmp['idcol']." order by 2";
							$result2=mysql_query($query, $link) or die(mysql_error());
   							$totEmp2=mysql_num_rows($result2);							
							echo "<tr>";
							echo "<td rowspan=".($totEmp2+1).">".$rowEmp['idcol']."</td>";
							echo "<td rowspan=".($totEmp2+1).">".$rowEmp['nomcol']."</td>";
							echo "<td rowspan=".($totEmp2+1)."><a href='ae_colegio_f_agrega.php?id_col=$rowEmp[idcol]' id='linkAgrega'>Agregar</a></td>";
							echo "</tr>";	
							if ($totEmp2>0){
								while ($rowEmp2 = mysql_fetch_assoc($result2)){
									$query="select * from anio_escolar where idanio=".$rowEmp2['idanio'];
									$result3=mysql_query($query, $link) or die(mysql_error());
									$row=mysql_fetch_row($result3);		

									$query="select * from alu_ae_colegio where idcol=".$rowEmp['idcol']." and idanio=".$rowEmp2['idanio'];
									$result4=mysql_query($query, $link) or die(mysql_error());
									$totEmp3=mysql_num_rows($result4);  	

									echo "<tr>";
									echo "<td>".$row[0]."</td>";
									echo "<td>".$row[1]."</td>";
									//echo "<td><a href='alu_ae_colegio.php?id_col=$rowEmp[idcol]&id_anio=$rowEmp2[idanio]' id='LinkEdita'>Ver (".$totEmp3.")</a></td>";
									echo "<td>"."<a href='ae_colegio_f_borra.php?id_col=$rowEmp[idcol]&id_anio=$rowEmp2[idanio]' id='LinkBorra'>Borrar</a></td>";									
									echo "</tr>";																											
								}	
							}
						}	
						echo "</table>";	
					}
				?>
			</div>
			<!---->						
		</div>
	</body>		
</html>