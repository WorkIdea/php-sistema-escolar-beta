<!DOCTYPE HTML>
<html>		
	<head>
		<title>Asignaturas/Año Escolar</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_asignatura_ae.css" media="screen"/>
	</head>
	<body>
		<div class="DivGeneral4">
			<div class="DivPanelData">			
				<?php
					require_once("../php_default.php");
					$query="delete from calif_asig_alu 
								where idasig in(select idasig from asignatura_ae 
													where idanio=$_REQUEST[id_anio]
													and idasig=$_REQUEST[id_asig])";
					mysql_query($query,$link) or die(mysql_error());

					$query="delete from asignatura_ae where idanio=".$_REQUEST['id_anio']." and idasig=".$_REQUEST['id_asig'];
					mysql_query($query,$link) or die(mysql_error());

					$query= "delete from doc_asig_ae_colegio where idasig in (select idasig from asignatura_ae where idanio= ".$_REQUEST['id_anio']."
													and idasig= ".$_REQUEST['id_asig'].")";
					mysql_query($query,$link) or die(mysql_error());	
					echo "<center>El registro ha sido Borrado. </center>";
					echo "<center><a href='asignatura_ae.php?id_anio=$_REQUEST[id_anio]'>Volver</a></center>";
				?>			
			</div>
		</div>
	</body>		
</html>