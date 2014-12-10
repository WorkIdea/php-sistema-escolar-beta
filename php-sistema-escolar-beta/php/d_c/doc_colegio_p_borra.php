<!DOCTYPE HTML>
<html>		
	<head>
		<title>Docentes/Colegio</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_doc_colegio.css" media="screen"/>		
	</head>
	<body>
		<div class="DivGeneral4">
			<div class="DivPanelData">		
				<?php
					require_once("../php_default.php");
					$query="delete from doc_asig_ae_colegio 
								where idcol=".$_REQUEST['id_col']." 
								and idanio=".$_REQUEST['id_anio']."
								and idasig=".$_REQUEST['id_asig']."
								and iddoc=".$_REQUEST['id_doc'];
					mysql_query($query,$link) or die(mysql_error());	
					echo "<center>El registro ha sido Borrado. </center>";
					echo "<center><a href='doc_colegio.php?id_col=$_REQUEST[id_col]'>Volver</a></center>";
				?>		
			</div>
		</div>		
	</body>		
</html>