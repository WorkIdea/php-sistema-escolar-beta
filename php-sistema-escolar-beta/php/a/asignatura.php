<?php
	require_once("../php_default.php");
	$query="select * from asignatura order by 1";
   	$result=mysql_query($query, $link) or die(mysql_error());
   	$totEmp=mysql_num_rows($result);   	
?>
<!DOCTYPE HTML>
<html>		
	<head>
		<title>Asignaturas</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_asignatura.css" media="screen"/>
	</head>
	<body>
		<div class="DivGeneral">
			<!---->
			<div class="DivTitulo">
				<a href="../admin.php" id="linkAtras">Atras</a>
				<strong>Registro de Asignaturas</strong>
				<a href="asignatura_f_agrega.php" id="linkAgrega">Agregar</a><br>
			</div>
			<!---->			
			<div class="DivPanelData">
				<table border=1>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th colspan="2">Acciones</th>
				</tr>
				<?php   
					if ($totEmp>0){
						while ($rowEmp = mysql_fetch_assoc($result)){							
							echo "<tr>";
							echo "<td>".$rowEmp['idasig']."</td>";
							echo "<td>".$rowEmp['nomasig']."</td>";
							echo "<td><a href='asignatura_f_edita.php?id_asig=$rowEmp[idasig]' id='LinkEdita'>Editar</a></td>";
							echo "<td><a href='asignatura_f_borra.php?id_asig=$rowEmp[idasig]' id='LinkBorra'>Borrar</a></td>";
							echo "</tr>";
						}	
					}
				?>
				</table>
			</div>
			<!---->						
		</div>
	</body>		
</html>