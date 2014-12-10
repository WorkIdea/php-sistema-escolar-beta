<!DOCTYPE HTML>
<html>		
	<head>
		<title>Asignaturas</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_asignatura.css" media="screen"/>
	</head>
	<body>
		<div class="DivGeneral2">
			<div class="DivPanelData">
			<?php
				require_once("../php_default.php");
				$query="insert into asignatura (idasig,nomasig) values ($_REQUEST[idasig],'$_REQUEST[nomasig]')";
				mysql_query($query,$link) or die(mysql_error());	
				echo "<center>El registro ha sido Agregado. </center>";
				echo "<center><a href='asignatura.php'>Volver</a></center>";
			?>			
			</div>
		</div>
	</body>		
</html>