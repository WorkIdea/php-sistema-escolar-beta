<!DOCTYPE HTML>
<html>		
	<head>
		<title>Representantes/Colegio</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_rep_colegio.css" media="screen"/>	
	</head>
	<body>
		<div class="DivGeneral2">
			<div class="DivPanelData">		
				<?php
					require_once("../php_default.php");
					$query="insert into rep_colegio (idcol,idrep) values ($_REQUEST[idcol],$_REQUEST[idusu])";
					mysql_query($query,$link) or die(mysql_error());	
					echo "<center>El registro ha sido Agregado. </center>";
				?>
				<center><a href="rep_colegio.php?id_col=<?php echo $_REQUEST['idcol']?>">Volver</a></center>
			</div>
		</div>		
	</body>		
</html>