<?php
	require_once("../php_default.php");
	$query="select * from asignatura where idasig=".$_REQUEST['id_asig'];
   	$result=mysql_query($query, $link) or die(mysql_error());	
   	$row=mysql_fetch_array($result);	
?>
<!DOCTYPE HTML>
<html>		
	<head>
		<title>Asignaturas</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_asignatura.css" media="screen"/>
		<script type="text/javascript" src="../../js/js_default.js"></script>
		<script type="text/javascript" src="../../js/js_asignatura.js"></script>	
	</head>

	<body>
		<div class="DivGeneral4">
			<!---->
			<div class="DivTitulo">
				<strong>Borra Asignatura</strong>
				<a href="asignatura.php" id="linkAtras">Atras</a><br>		
			</div>
			<!---->
			<div class="DivPanelData">
				<form action="asignatura_p_borra.php" method="post">
					<?php
						echo "¿Esta seguro de borrar a: ".$row['nomasig']."?<br>";
					?>					
					<input name="id_asig" type="hidden" value="<?php echo $row['idasig'];?>"/>
					<input name="eliminar" type="submit" value="Borrar"/>
				</form>
			</div>
			<!---->
		</div>
	</body>
</html>