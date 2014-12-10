<!DOCTYPE HTML>
<html>		
	<head>
		<title>Rol de Usuario</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_usuario_rol.css" media="screen"/>		
	</head>
	<body>
		<div class="DivGeneral4">
			<?php
				require_once("../php_default.php");
				$query="delete from usuario_rol where idusu=".$_REQUEST['id_usu']." and rolusu='".$_REQUEST['rol_usu']."'";			
				mysql_query($query,$link) or die(mysql_error());	

				if ($_REQUEST['rol_usu'] == 'REP'){
					$query="delete from alu_rep where idrep=".$_REQUEST['id_usu'];
					mysql_query($query,$link) or die(mysql_error());

					$query="delete from rep_colegio where idrep=".$_REQUEST['id_usu'];		
					mysql_query($query,$link) or die(mysql_error());			
				}
				elseif ($_REQUEST['rol_usu'] == 'DOC') {
					$query="delete from doc_asig_ae_colegio where where iddoc=".$_REQUEST['id_usu'];	
					mysql_query($query,$link) or die(mysql_error());										
				}
				elseif ($_REQUEST['rol_usu'] == 'ALU') {
					$query="delete from alu_rep where idalu=".$_REQUEST['id_usu'];	
					mysql_query($query,$link) or die(mysql_error());

					$query="delete from alu_ae_colegio where idalu=".$_REQUEST['id_usu'];
					mysql_query($query,$link) or die(mysql_error());	

					$query="delete from calif_asig_alu where idalu=".$_REQUEST['id_usu'];
					mysql_query($query,$link) or die(mysql_error());					
				}			

				echo "<center>El registro ha sido Borrado. </center>";
			?>
			<center><a href="usuario_rol.php?id_usu=<?php echo $_REQUEST['id_usu'];?>">Volver</a></center>
		</div>
	</body>		
</html>