<?php
	require_once("../php_default.php");
	$query="select * from colegio where idcol=".$_REQUEST['id_col'];
   	$result=mysql_query($query, $link) or die(mysql_error());
   	$row=mysql_fetch_row($result);		
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

	<body onload="ValidaFormaEdita()">
		<div class="DivGeneral3">
			<!---->
			<div class="DivTitulo">
				<strong>Edita Colegio</strong>
				<a href="colegio.php" id="linkAtras">Atras</a><br>				
			</div>
			<!---->
			<div class="DivPanelData">
				<form action="colegio_p_edita.php" onsubmit="return ValidaCampos();" method="post">
					<label>ID</label><br>
					<input type="text" name="idcol" id="idcol" value="<?php echo $row[0];?>"><br>
					<label>Nombre</label><br>
					<input type="text" name="nomcol" id="nomcol" value="<?php echo $row[1];?>" onKeyUp="this.value=this.value.toUpperCase();"><br>
					<label>Direccion</label><br>
					<input type="text" name="direcol" id="direcol" value="<?php echo $row[2];?>" onKeyUp="this.value=this.value.toUpperCase();"><br>					
					<input type="submit" value="Editar">																			
				</form>	
			</div>
			<!---->
		</div>
	</body>
</html>