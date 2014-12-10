<!DOCTYPE HTML>
<html>		
	<head>
		<title>Alumnos/Año Escolar/Colegios</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_alu_ae_colegio.css" media="screen"/>
	</head>
	<body>
		<div class="DivGeneral4">
			<div class="DivPanelData">
				<?php
					require_once("../php_default.php");				
					$query="delete from alu_ae_colegio where idcol=".$_REQUEST['id_col']." and idanio=".$_REQUEST['id_anio']." and idalu=".$_REQUEST['id_alu'];
					mysql_query($query,$link) or die(mysql_error());

					$query="delete from calif_asig_alu_lapso where idalu=".$_REQUEST['id_alu'];
					mysql_query($query,$link) or die(mysql_error());

					$query="delete from asisten_asig_alu where idalu=".$_REQUEST['id_alu'];
					mysql_query($query,$link) or die(mysql_error());				

					echo "<center>El registro ha sido Borrado. </center>";
					echo "<center><a href='alu_ae_colegio.php?id_col=$_REQUEST[id_col]'>Volver</a></center>";
				?>				
			</div>			
		</div>
	</body>		
</html>