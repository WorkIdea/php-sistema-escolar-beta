<!DOCTYPE HTML>
<html>		
	<head>
		<title>Usuarios</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_usuario_info.css" media="screen"/>		
	</head>
	<body>
		<div class="DivGeneral4">
			<div class="DivPanelData">
			<?php
				require_once("../php_default.php");
				$query="delete from usuario_info where idusu=".$_REQUEST['id_usu'];
				mysql_query($query,$link) or die(mysql_error());

				$query="delete from usuario_rol where idusu=".$_REQUEST['id_usu'];	
				mysql_query($query,$link) or die(mysql_error());

				$query="delete from usuario_login where idusu=".$_REQUEST['id_usu'];	
				mysql_query($query,$link) or die(mysql_error());	

				//

				$query="delete from alu_rep where idrep=".$_REQUEST['id_usu']." or idalu=".$_REQUEST['id_usu'];
				mysql_query($query,$link) or die(mysql_error());			

				$query="delete from rep_colegio where idrep=".$_REQUEST['id_usu'];	
				mysql_query($query,$link) or die(mysql_error());

				$query="delete from alu_ae_colegio where idalu=".$_REQUEST['id_usu'];
				mysql_query($query,$link) or die(mysql_error());

				$query="delete from doc_asig_ae_colegio where iddoc=".$_REQUEST['id_usu'];
				mysql_query($query,$link) or die(mysql_error());

				$query="delete from calif_asig_alu where idalu=".$_REQUEST['id_usu'];
				mysql_query($query,$link) or die(mysql_error());				

				echo "<center>El registro ha sido Borrado. </center>";
				echo "<center><a href='usuario_info.php' id='linkAtras2'>Volver</a></center>";
			?>
			</div>
		</div>
	</body>		
</html>