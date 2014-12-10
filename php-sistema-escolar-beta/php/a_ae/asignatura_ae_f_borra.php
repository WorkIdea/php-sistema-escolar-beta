<?php
	require_once("../php_default.php");
   	$query="select ae.idanio,ae.nomanio,a.idasig,a.nomasig
   				from anio_escolar ae,
   					 asignatura a,  
   					 asignatura_ae aae    				
   				where ae.idanio=aae.idanio
				and a.idasig=aae.idasig
   				and ae.idanio=".$_REQUEST['id_anio'].
   			" and a.idasig=".$_REQUEST['id_asig'];	
   	$result=mysql_query($query, $link) or die(mysql_error());	
   	$row=mysql_fetch_array($result);
?>
<!DOCTYPE HTML>
<html>		
	<head>
		<title>Asignaturas/Año Escolar</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_asignatura_ae.css" media="screen"/>
		<script type="text/javascript" src="../../js/js_default.js"></script>
		<script type="text/javascript" src="../../js/js_asignatura_ae.js"></script>
	</head>

	<body>
		<div class="DivGeneral4">
			<!---->
			<div class="DivTitulo">				
				<a href="asignatura_ae.php?id_anio=<?php echo $row[0];?>" id="linkAtras">Atras</a>					
				<strong>Borra Asignatura/Año Escolar</strong>
			</div>
			<!---->
			<div class="DivPanelData">
				<form action="asignatura_ae_p_borra.php" method="post">
					<?php
						echo "¿Esta seguro de borrar a: ".$row['nomasig']." de ".$row['nomanio']."?<br>";
					?>										
					<input name="id_anio" type="hidden" value="<?php echo $row['idanio'];?>"/>
					<input name="id_asig" type="hidden" value="<?php echo $row['idasig'];?>"/>
					<input name="eliminar" type="submit" value="Borrar"/>
				</form>
			</div>
			<!---->
		</div>
	</body>
</html>