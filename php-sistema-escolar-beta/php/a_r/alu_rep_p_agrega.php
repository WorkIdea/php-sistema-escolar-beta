<!DOCTYPE HTML>
<html>		
	<head>
		<title>Alumnos/Representante</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_alu_rep.css" media="screen"/>	
	</head>
	<body>
		<div class="DivGeneral2">
			<?php
				require_once("../php_default.php");
				$query= "insert into alu_rep (idrep,idalu) values ($_REQUEST[idrep],'$_REQUEST[idalu]')";
				mysql_query($query,$link) or die(mysql_error());				
				echo "<center>El registro ha sido Agregado. </center>";
			?>
			<center><a href="alu_rep.php">Volver</a></center>
		</div>
	</body>		
</html>