<?php
	require_once("../php_default.php");
	$query="select * from anio_escolar where idanio=".$_REQUEST['id_anio'];
   	$result=mysql_query($query, $link) or die(mysql_error());	
   	$row=mysql_fetch_array($result);	
?>
<!DOCTYPE HTML>
<html>		
	<head>
		<title>Años Escolares</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_anio_escolar.css" media="screen"/>
		<script type="text/javascript" src="../../js/js_default.js"></script>
		<script type="text/javascript" src="../../js/js_anio_escolar.js"></script>	
	</head>

	<body>
		<div class="DivGeneral4">
			<!---->
			<div class="DivTitulo">
				<strong>Borra Año Escolar</strong>
				<a href="anio_escolar.php" id="linkAtras">Atras</a><br>		
			</div>
			<!---->
			<div class="DivPanelData">
				<form action="anio_escolar_p_borra.php" method="post">
					<?php
						echo "¿Esta seguro de borrar a: ".$row['nomanio']."?<br>";
					?>					
					<input name="id_anio" type="hidden" value="<?php echo $row['idanio'];?>"/>
					<input name="eliminar" type="submit" value="Borrar"/>
				</form>
			</div>
			<!---->
		</div>
	</body>
</html>