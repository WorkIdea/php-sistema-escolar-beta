<?php
	require_once("../php_default.php");
	$query="select * from anio_escolar order by 1";
   	$result=mysql_query($query, $link) or die(mysql_error());
   	$totEmp=mysql_num_rows($result);   	
?>
<!DOCTYPE HTML>
<html>		
	<head>
		<title>Años Escolares</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_anio_escolar.css" media="screen"/>
	</head>
	<body>
		<div class="DivGeneral">
			<!---->
			<div class="DivTitulo">
				<a href="../admin.php" id="linkAtras">Atras</a>
				<strong>Registro de Años Escolares</strong>
				<a href="anio_escolar_f_agrega.php" id="linkAgrega">Agregar</a><br>
			</div>
			<!---->			
			<div class="DivPanelData">
				<table border=1>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Asignaturas</th>
					<th colspan="2">Acciones</th>
				</tr>
				<?php   
					if ($totEmp>0){
						while ($rowEmp = mysql_fetch_assoc($result)){
							$query="select * from asignatura_ae where idanio=".$rowEmp['idanio'];
							$result2=mysql_query($query, $link) or die(mysql_error());
							$totEmp2=mysql_num_rows($result2);

							echo "<tr>";
							echo "<td>".$rowEmp['idanio']."</td>";
							echo "<td>".$rowEmp['nomanio']."</td>";
							echo "<td><a href='../a_ae/asignatura_ae.php?id_anio=$rowEmp[idanio]' id='Link'>Ver (".$totEmp2.")</a></td>";
							echo "<td><a href='anio_escolar_f_edita.php?id_anio=$rowEmp[idanio]' id='LinkEdita'>Editar</a></td>";
							echo "<td><a href='anio_escolar_f_borra.php?id_anio=$rowEmp[idanio]' id='LinkBorra'>Borrar</a></td>";
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