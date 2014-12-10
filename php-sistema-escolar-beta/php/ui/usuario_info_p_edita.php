<!DOCTYPE HTML>
<html>		
	<head>
		<title>Usuarios</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_usuario_info.css" media="screen"/>
	</head>
	<body>
		<div class="DivGeneral3">
			<div class="DivPanelData">
				<?php
					require_once("../php_default.php");
					$query="update usuario_info set nomusu='$_REQUEST[nomusu]',apeusu='$_REQUEST[apeusu]',direcusu='$_REQUEST[direcusu]' WHERE idusu =".$_REQUEST['idusu'];
					mysql_query($query,$link) or die(mysql_error());
					echo "<center>El registro ha sido Actualizado. </center>";
					echo "<center><a href='usuario_info.php' id='linkAtras2'>Volver</a></center>";					
				?>				
			</div>
		</div>		
	</body>		
</html>