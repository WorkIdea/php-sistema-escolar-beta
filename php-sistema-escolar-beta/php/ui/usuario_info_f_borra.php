<?php
	require_once("../php_default.php");
	$query="select * from usuario_info where idusu=".$_REQUEST['id_usu'];
   	$result=mysql_query($query, $link) or die(mysql_error());	
   	$row=mysql_fetch_array($result);	
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
	<body>
		<div class="DivGeneral4">
			<!---->
			<div class="DivTitulo">
				<strong>Borra Usuario</strong>
				<a href="usuario_info.php" id="linkAtras">Atras</a><br>				
			</div>
			<!---->
			<div class="DivPanelData">
				<form action="usuario_info_p_borra.php" method="post">
					<?php
						echo "¿Esta seguro de borrar a: ".$row['nomusu']." ".$row['apeusu']."?<br>";
					?>					
					<input name="id_usu" type="hidden" value="<?php echo $row['idusu'];?>"/>
					<input type="submit" id="BSubmit" value="Borrar"/>
				</form>
			</div>
			<!---->
		</div>
	</body>
</html>