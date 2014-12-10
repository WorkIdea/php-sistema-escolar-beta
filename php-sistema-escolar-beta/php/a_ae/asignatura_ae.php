<?php
	require_once("../php_default.php");
	$query="select * from anio_escolar where idanio=".$_REQUEST['id_anio'];
   	$result=mysql_query($query, $link) or die(mysql_error());
   	$totEmp=mysql_num_rows($result);  	
?>
<!DOCTYPE HTML>
<html>		
	<head>
		<title>Asignaturas/Año Escolar</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_asignatura_ae.css" media="screen"/>
	</head>
	<body>
		<div class="DivGeneral">
			<!---->
			<div class="DivTitulo">
				<a href="../ae/anio_escolar.php" id="linkAtras">Atras</a>
				<strong>Registro de Asignaturas/Año Escolar</strong>							
			</div>
			<!---->			
			<div class="DivPanelData">						
				<?php
					echo "<table border=1>";
					echo "<tr>";
					echo "<td>ID</td>";
					echo "<td>Año Escolar</td>";						
					echo "<td></td>";
					echo "<td>ID</td>";			
					echo "<td>Asignatura</td>";			
					echo "<td></td>";
					echo "</tr>";
					while ($rowEmp = mysql_fetch_assoc($result)){									
					 	$query="select * from asignatura_ae where idanio=".$rowEmp['idanio']." order by 2";
						$result2=mysql_query($query, $link) or die(mysql_error());
   						$totEmp2=mysql_num_rows($result2);							
						echo "<tr>";
						echo "<td rowspan=".($totEmp2+1).">".$rowEmp['idanio']."</td>";
						echo "<td rowspan=".($totEmp2+1).">".$rowEmp['nomanio']."</td>";
						echo "<td rowspan=".($totEmp2+1)."><a href='asignatura_ae_f_agrega.php?id_anio=$rowEmp[idanio]' id='linkAgrega'>Agregar</a></td>";
						echo "</tr>";	
						if ($totEmp2>0){
							while ($rowEmp2 = mysql_fetch_assoc($result2)){
								$query="select * from asignatura where idasig=".$rowEmp2['idasig'];
								$result3=mysql_query($query, $link) or die(mysql_error());
								$row=mysql_fetch_row($result3);		
								echo "<tr>";
								echo "<td>".$row[0]."</td>";
								echo "<td>".$row[1]."</td>";
								echo "<td>"."<a href='asignatura_ae_f_borra.php?id_anio=$rowEmp[idanio]&id_asig=$rowEmp2[idasig]' id='LinkBorra'>Borrar</a></td>";										
								echo "</tr>";																											
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