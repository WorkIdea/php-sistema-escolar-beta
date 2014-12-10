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
					$query="insert into doc_asig_ae_colegio values($_REQUEST[idcol],$_REQUEST[idanio],$_REQUEST[idasig],$_REQUEST[iddoc])";
					mysql_query($query,$link) or die(mysql_error());	
					echo "<center>El registro ha sido Agregado. </center>";
					echo "<center><a href='doc_colegio.php?id_col=$_REQUEST[idcol]'>Volver</a></center>";
				?>		
			</div>
		</div>
	</body>		
</html>