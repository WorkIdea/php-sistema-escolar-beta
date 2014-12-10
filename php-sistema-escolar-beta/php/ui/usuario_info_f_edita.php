<?php
	require_once("../php_default.php");
	$query="select * from usuario_info where idusu=".$_REQUEST['id_usu'];
   	$result=mysql_query($query, $link) or die(mysql_error());
   	$row=mysql_fetch_row($result);		
?>
<!DOCTYPE HTML>
<html>		
	<head>
		<title>Usuarios</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_usuario_info.css" media="screen"/>	
		<script type="text/javascript" src="../../js/js_default.js"></script>
		<script type="text/javascript" src="../../js/js_usuario_info.js"></script>
	</head>
	<body onload="ValidaFormaEdita()">
		<div class="DivGeneral3">
			<!---->
			<div class="DivTitulo">
				<strong>Edita Usuario</strong>
				<a href="usuario_info.php" id="linkAtras">Atras</a><br>				
			</div>
			<!---->
			<div class="DivPanelData">
				<form action="usuario_info_p_edita.php" onsubmit="return ValidaCampos();" method="post">
					<!--<label>ID</label><br>-->
					<input type="hidden" name="idusu" id="idusu" value="<?php echo $row[0];?>">
					<label>Tipo y Numero de Identificacion</label><br>
					<select name="tipoid" id="tipoid"> 
						<option value="<?php echo $row[1];?>"><?php echo $row[1];?></option>
					</select>												
					<input type="text" name="numid" id="numid" value="<?php echo $row[2];?>" onkeypress="return isNumberKey(event)"><br>									
					<label>Nombre</label><br>
					<input type="text" name="nomusu" id="nomusu" value="<?php echo $row[3];?>" onKeyUp="this.value=this.value.toUpperCase();"><br>
					<label>Apellido</label><br>
					<input type="text" name="apeusu" id="apeusu" value="<?php echo $row[4];?>" onKeyUp="this.value=this.value.toUpperCase();"><br>					
					<label>Direccion</label><br>
					<input type="text" name="direcusu" id="direcusu" value="<?php echo $row[5];?>" onKeyUp="this.value=this.value.toUpperCase();"><br>
					<input type="submit" id="BSubmit" value="Editar">																			
				</form>	
			</div>
			<!---->
		</div>
	</body>
</html>