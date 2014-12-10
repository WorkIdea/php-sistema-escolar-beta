<?php
	require_once("../php_default.php");
	$query="select idusu,nomusu,apeusu from usuario_info where idusu=".$_REQUEST['id_rep'];	
   	$result=mysql_query($query, $link) or die(mysql_error());
	$row=mysql_fetch_array($result);   	

	$query="select idusu,nomusu,apeusu from usuario_info where idusu=".$_REQUEST['id_alu'];
   	$result2=mysql_query($query, $link) or die(mysql_error());
	$row2=mysql_fetch_array($result2);   		
?>
<!DOCTYPE HTML>
<html>		
	<head>
		<title>Alumnos/Representante</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_alu_rep.css" media="screen"/>
		<script type="text/javascript" src="../../js/js_default.js"></script>
		<script type="text/javascript" src="../../js/js_alu_rep.js"></script>
	</head>
	<body onload="ValidaFormaEdita()">
		<div class="DivGeneral4">
			<!---->
			<div class="DivTitulo">
				<a href="alu_rep.php" id="linkAtras">Atras</a>
				<strong>Borra Alumnos/Representante</strong>							
			</div>
			<!---->			
			<div class="DivPanelData">
				<form action="alu_rep_p_borra.php" method="post">
					<?php
						echo "¿Esta seguro de borrar a: ".$row2['nomusu']." ".$row2['apeusu']." de ".$row['nomusu']." ".$row['apeusu']."?<br>";
					?>										
					<input name="id_rep" type="hidden" value="<?php echo $row['idusu'];?>"/>
					<input name="id_alu" type="hidden" value="<?php echo $row2['idusu'];?>"/>
					<input name="eliminar" type="submit" value="Borrar"/>
				</form>																							
			</div>
			<!---->						
		</div>
	</body>		
</html>	