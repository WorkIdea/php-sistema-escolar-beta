<!DOCTYPE HTML>
<html>		
	<head>
		<title>Colegios</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_colegio.css" media="screen"/>
	</head>
	<body>
		<div class="DivGeneral3">
			<div class="DivPanelData">
				<?php
					require_once("../php_default.php");
					$query="update colegio set nomcol='$_REQUEST[nomcol]',direcol='$_REQUEST[direcol]' WHERE idcol =".$_REQUEST['idcol'];
					mysql_query($query,$link) or die(mysql_error());
					echo "<center>El registro ha sido Actualizado. </center>";
					echo "<center><a href='colegio.php'>Volver</a></center>";
				?>
			</div>
		</div>
	</body>		
</html>

