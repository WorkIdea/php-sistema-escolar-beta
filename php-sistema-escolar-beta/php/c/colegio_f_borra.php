<?php
	require_once("../php_default.php");
	$query="select * from colegio where idcol=".$_REQUEST['id_col'];
   	$result=mysql_query($query, $link) or die(mysql_error());	
   	$row=mysql_fetch_array($result);	
?>
<!DOCTYPE HTML>
<html>		
	<head>
		<title>Colegios</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_colegio.css" media="screen"/>
		<script type="text/javascript" src="../../js/js_default.js"></script>
		<script type="text/javascript" src="../../js/js_colegio.js"></script>
	</head>

	<body>
		<div class="DivGeneral4">
			<!---->
			<div class="DivTitulo">
				<strong>Borra Colegio</strong>
				<a href="colegio.php" id="linkAtras">Atras</a><br>				
			</div>
			<!---->
			<div class="DivPanelData">
				<form action="colegio_p_borra.php" method="post">
					<?php
						echo "¿Esta seguro de borrar a: ".$row['nomcol']."?<br>";
					?>					
					<input name="id_col" type="hidden" value="<?php echo $row['idcol'];?>"/>
					<input name="eliminar" type="submit" value="Borrar"/>
				</form>
			</div>
			<!---->
		</div>
	</body>
</html>