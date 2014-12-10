<?php
	require_once("../php_default.php");
	$query="select max(idusu)+1 from usuario_info";
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
	<body onload="ValidaForma()">
		<div class="DivGeneral2">
			<!---->
			<div class="DivTitulo">
				<strong>Agrega Usuario</strong>
				<a href="usuario_info.php" id="linkAtras">Atras</a><br>					
			</div>
			<!---->
			<div class="DivPanelData">
				<form action="usuario_info_p_agrega.php" onsubmit="return ValidaCampos();" method="post">
					<!--<label>ID</label><br>-->
					<input type="hidden" name="idusu" id="idusu" value="<?php echo $row[0];?>">
					<label>Tipo y Numero de Identificacion</label><br>
					<select name="tipoid" id="tipoid">
					<option value="-">-</option> 
						<?php
							$query="select * from tab_central where tipotab = 'TIPOID' order by 2";
	   						$result=mysql_query($query, $link) or die(mysql_error());
	   						$totEmp=mysql_num_rows($result); 
							if ($totEmp>0){
								while ($rowEmp = mysql_fetch_assoc($result)){	
								 echo "<option value='".$rowEmp['codtab']."'>".$rowEmp['codtab']."</option>";
								}	
							}
						?>
					</select>												
					<input type="text" name="numid" id="numid" onkeypress="return isNumberKey(event)"><br>									
					<label>Nombre</label><br>
					<input type="text" name="nomusu" id="nomusu" onKeyUp="this.value=this.value.toUpperCase();"><br>
					<label>Apellido</label><br>
					<input type="text" name="apeusu" id="apeusu" onKeyUp="this.value=this.value.toUpperCase();"><br>					
					<label>Direccion</label><br>
					<input type="text" name="direcusu" id="direcusu" onKeyUp="this.value=this.value.toUpperCase();"><br>										
					<input type="submit" id="BSubmit" value="Agregar">																			
				</form>	
			</div>
			<!---->
		</div>
	</body>
</html>