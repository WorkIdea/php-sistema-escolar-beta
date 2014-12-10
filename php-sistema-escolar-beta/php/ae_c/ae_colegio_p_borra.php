<!DOCTYPE HTML>
<html>		
	<head>
		<title>Años Escolares/Colegio</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_ae_colegio.css" media="screen"/>
	</head>
	<body>
		<div class="DivGeneral4">
			<div class="DivPanelData">			
				<?php
					require_once("../php_default.php");
					$query="delete from ae_colegio where idcol=".$_REQUEST['id_col']." and idanio=".$_REQUEST['id_anio'];
					mysql_query($query,$link) or die(mysql_error());

					$query="delete from doc_asig_ae_colegio where idcol=".$_REQUEST['id_col']." and idanio=".$_REQUEST['id_anio'];
					mysql_query($query,$link) or die(mysql_error());

					$query="delete from calif_asig_alu 
								where idalu in(select idalu from alu_ae_colegio
												where idcol=$_REQUEST[id_col]
												and idanio=$_REQUEST[id_anio])";
					mysql_query($query,$link) or die(mysql_error());			

					$query="delete from alu_ae_colegio where idcol=".$_REQUEST['id_col']." and idanio=".$_REQUEST['id_anio'];
					mysql_query($query,$link) or die(mysql_error());

					echo "<center>El registro ha sido Borrado. </center>";
				?>
				<center><a href="ae_colegio.php?id_col=<?php echo $_REQUEST['id_col']?>">Volver</a></center>
			</div>
		</div>			
	</body>		
</html>