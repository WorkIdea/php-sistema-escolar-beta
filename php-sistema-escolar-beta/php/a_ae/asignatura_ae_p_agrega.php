<!DOCTYPE HTML>
<html>		
	<head>
		<title>Asignaturas/Año Escolar</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_asignatura_ae.css" media="screen"/>
	</head>
	<body>
		<div class="DivGeneral2">
			<div class="DivPanelData">
				<?php
					require_once("../php_default.php");
					//$query="insert into asignatura_ae (idanio,idasig) values ($_REQUEST[idanio],$_REQUEST[idasig])";
					//mysql_query($query,$link) or die(mysql_error());	
					//echo "<center>El registro ha sido Agregado. </center>";
					//crear proceso de inclusion de asignaturas para alumnos
					echo "<center><a href='asignatura_ae.php?id_anio=$_REQUEST[idanio]'>Volver</a></center>";
				?>			
			</div>
		</div>
	</body>		
</html>