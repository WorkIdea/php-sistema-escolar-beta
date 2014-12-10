<!DOCTYPE HTML>
<html>		
	<head>
		<title>Usuarios</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_usuario_info.css" media="screen"/>	
	</head>
	<body>
		<div class="DivGeneral2">
			<div class="DivPanelData">
				<?php
					require_once("../php_default.php");
					$query= "insert into usuario_info (idusu,tipoid,numid,nomusu,apeusu,direcusu) ".
							"values ($_REQUEST[idusu],'$_REQUEST[tipoid]',$_REQUEST[numid],'$_REQUEST[nomusu]','$_REQUEST[apeusu]','$_REQUEST[direcusu]')";
					mysql_query($query,$link) or die(mysql_error());
					$query="insert into usuario_login (idusu,tipoid,numid,passusu) ".
						   "values($_REQUEST[idusu],'$_REQUEST[tipoid]',$_REQUEST[numid],'123')";	
					mysql_query($query,$link) or die(mysql_error());				   
					echo "<center>El registro ha sido Agregado. </center>";
					echo "<center><a href='usuario_info.php' id='linkAtras2'>Volver</a></center>";
				?>
			</div>
		</div>
	</body>		
</html>