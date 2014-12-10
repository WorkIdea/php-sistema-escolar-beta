<?php
	require_once("../php_default.php");
	$query="select * from usuario_info ui
				where exists(select 1 from usuario_rol ur
								where ui.idusu=ur.idusu 
								and ur.rolusu='REP')";
   	$result=mysql_query($query, $link) or die(mysql_error());
   	$totEmp=mysql_num_rows($result); 
?>
<!DOCTYPE HTML>
<html>		
	<head>
		<title>Alumnos/Representante</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_alu_rep.css" media="screen"/>
	</head>
	<body>
		<div class="DivGeneral">
			<!---->
			<div class="DivTitulo">
				<a href="../ui/usuario_info.php" id="linkAtras">Atras</a>
				<strong>Registro de Alumnos/Representante</strong>							
			</div>
			<!---->			
			<div class="DivPanelData">						
				<?php
					echo "<table border=1>";
					echo "<tr>";
					echo "<td>ID</td>";
					echo "<td>Representante</td>";						
					echo "<td></td>";
					echo "<td>ID</td>";			
					echo "<td>Alumno</td>";			
					echo "<td></td>";
					echo "</tr>";
					while ($rowEmp = mysql_fetch_assoc($result)){									
					 	$query="select * from alu_rep where idrep=".$rowEmp['idusu']." order by 2";
						$result2=mysql_query($query, $link) or die(mysql_error());
   						$totEmp2=mysql_num_rows($result2);							
						echo "<tr>";
						echo "<td rowspan=".($totEmp2+1).">".$rowEmp['idusu']."</td>";
						echo "<td rowspan=".($totEmp2+1).">".$rowEmp['nomusu']." ".$rowEmp['apeusu']."</td>";
						echo "<td rowspan=".($totEmp2+1)."><a href='alu_rep_f_agrega.php?id_rep=$rowEmp[idusu]' id='LinkAgrega'>Agregar</a></td>";
						echo "</tr>";	
						if ($totEmp2>0){
							while ($rowEmp2 = mysql_fetch_assoc($result2)){
								$query="select * from usuario_info where idusu=".$rowEmp2['idalu'];
								$result3=mysql_query($query, $link) or die(mysql_error());
								$row=mysql_fetch_row($result3);		
								echo "<tr>";
								echo "<td>".$row[0]."</td>";
								echo "<td>".$row[3]." ".$row[4]."</td>";
								echo "<td>"."<a href='alu_rep_f_borra.php?id_rep=$rowEmp2[idrep]&id_alu=$rowEmp2[idalu]' id='LinkBorra'>Borrar</a></td>";										
								echo "</tr>";																											
							//*/								
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