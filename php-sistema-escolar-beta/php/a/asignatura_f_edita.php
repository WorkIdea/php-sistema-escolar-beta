<?php
	require_once("../php_default.php");
	$query="select * from asignatura where idasig=".$_REQUEST['id_asig'];
   	$result=mysql_query($query, $link) or die(mysql_error());
   	$row=mysql_fetch_row($result);		
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

	<body onload="ValidaFormaEdita()">
		<div class="DivGeneral">
			<!---->
			<div class="DivTitulo3">
				<strong>Edita Asignatura</strong>
				<a href="asignatura.php" id="linkAtras">Atras</a><br>				
			</div>
			<!---->
			<div class="DivPanelData">
				<form action="asignatura_p_edita.php" onsubmit="return ValidaCampos();" method="post">
					<label>ID</label><br>
					<input type="text" name="idasig" id="idasig" value="<?php echo $row[0];?>"><br>
					<label>Nombre</label><br>
					<input type="text" name="nomasig" id="nomasig" value="<?php echo $row[1];?>" onKeyUp="this.value=this.value.toUpperCase();"><br>
					<input type="submit" value="Editar">																			
				</form>
			</div>
			<!---->
		</div>
	</body>
</html>