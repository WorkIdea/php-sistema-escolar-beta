<!DOCTYPE HTML>
<html>		
	<head>
		<title>Colegios</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_colegio.css" media="screen"/>
	</head>
	<body>
		<div class="DivGeneral2">
			<div class="DivPanelData">
				<?php
					require_once("../php_default.php");
					$query="insert into colegio (idcol,nomcol,direcol) values ($_REQUEST[idcol],'$_REQUEST[nomcol]','$_REQUEST[direcol]')";
					mysql_query($query,$link) or die(mysql_error());	
					echo "<center>El registro ha sido Agregado. </center>";
					echo "<center><a href='colegio.php'>Volver</a></center>";
				?>				
			</div>
		</div>
	</body>		
</html>