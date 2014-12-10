<?php
	require_once("../php_default.php");
	$query="select max(idanio)+1 from anio_escolar order by 1";
   	$result=mysql_query($query, $link) or die(mysql_error());
   	$row=mysql_fetch_row($result);
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

	<body onload="ValidaForma()">
		<div class="DivGeneral2">
			<!---->
			<div class="DivTitulo">
				<strong>Agrega Año Escoclar</strong>
				<a href="anio_escolar.php" id="linkAtras">Atras</a><br>				
			</div>
			<!---->
			<div class="DivPanelData">
				<form action="anio_escolar_p_agrega.php" onsubmit="return ValidaCampos();" method="post">
					<label>ID</label><br>
					<input type="text" name="idanio" id="idanio" value="<?php echo $row[0];?>"><br>															
					<label>Nombre</label><br>
					<input type="text" name="nomanio" id="nomanio" onKeyUp="this.value=this.value.toUpperCase();"><br>					
					<input type="submit" value="Agregar">
				</form>	
			</div>
			<!---->
		</div>
	</body>
</html>