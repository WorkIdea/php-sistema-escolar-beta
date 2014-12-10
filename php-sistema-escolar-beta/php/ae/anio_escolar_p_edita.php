<!DOCTYPE HTML>
<html>		
	<head>
		<title>Años Escolares</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_anio_escolar.css" media="screen"/>
	</head>
	<body>
		<div class="DivGeneral3">
			<div class="DivPanelData">
				<?php
					require_once("../php_default.php");
					$query="update anio_escolar set nomanio='$_REQUEST[nomanio]' WHERE idanio =".$_REQUEST['idanio'];
					mysql_query($query,$link) or die(mysql_error());
					echo "<center>El registro ha sido Actualizado. </center>";
					echo "<center><a href='anio_escolar.php'>Volver</a></center>";
				?>			
			</div>
		</div>
	</body>		
</html>