<!DOCTYPE HTML>
<html>		
	<head>
		<title>Rol de Usuario</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_usuario_rol.css" media="screen"/>	
	</head>
	<body>
		<div class="DivGeneral2">
			<?php
				require_once("../php_default.php");
				$query= "insert into usuario_rol (idusu,rolusu) ".
						"values ($_REQUEST[idusu],'$_REQUEST[rolusu]')";
				mysql_query($query,$link) or die(mysql_error());				
				echo "<center>El registro ha sido Agregado. </center>";
			?>
			<center><a href="usuario_rol.php?id_usu=<?php echo $_REQUEST['idusu'];?>">Volver</a></center>
		</div>
	</body>		
</html>