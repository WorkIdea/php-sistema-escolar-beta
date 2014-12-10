<!DOCTYPE HTML>
<html>		
	<head>
		<title>Alumnos/Representante</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_alu_rep.css" media="screen"/>
	</head>
	<body>
		<div class="DivGeneral4">
			<?php
				require_once("../php_default.php");
				$query="delete from alu_rep where idalu=".$_REQUEST['id_alu']." and idrep=".$_REQUEST['id_rep'];
				mysql_query($query,$link) or die(mysql_error());	

				$query="delete from alu_ae_colegio where idalu=".$_REQUEST['id_alu'];
				mysql_query($query,$link) or die(mysql_error());	

				$query="delete from calif_asig_alu where idalu=".$_REQUEST['id_alu'];
				mysql_query($query,$link) or die(mysql_error());		
				
				echo "<center>El registro ha sido Borrado. </center>";
			?>
			<center><a href="alu_rep.php">Volver</a></center>
		</div>
	</body>		
</html>