<?php
	require_once("../php_default.php");
	$query="select ui.idusu,ui.nomusu,ui.apeusu,ur.rolusu,tc.desctab
						from usuario_info ui,
						  usuario_rol ur,
						(select codtab,desctab from tab_central where tipotab = 'ROLUSU') tc						
			where ui.idusu=ur.idusu 
			and ur.rolusu=tc.codtab			
			and ui.idusu=".$_REQUEST['id_usu'].
		  " and ur.rolusu='".$_REQUEST['rol_usu']."'";
   	$result=mysql_query($query, $link) or die(mysql_error());
	$row=mysql_fetch_array($result);   	
?>
<!DOCTYPE HTML>
<html>		
	<head>
		<title>Rol de Usuario</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_usuario_rol.css" media="screen"/>	
		<script type="text/javascript" src="../../js/js_default.js"></script>
		<script type="text/javascript" src="../../js/js_usuario_rol.js"></script>
	</head>
	<body onload="ValidaFormaEdita()">
		<div class="DivGeneral4">
			<!---->
			<div class="DivTitulo">				
				<a href="usuario_rol.php?id_usu=<?php echo $row[0];?>" id="linkAtras">Atras</a>
				<strong>Borra Rol de Usuario</strong><br>											
			</div>
			<!---->			
			<div class="DivPanelData">
				<form action="usuario_rol_p_borra.php" method="post">
					<?php
						echo "¿Esta seguro de borrar a: ".$row['desctab']." de ".$row['nomusu']." ".$row['apeusu']."?<br>";
					?>										
					<input name="id_usu" type="hidden" value="<?php echo $row['idusu'];?>"/>
					<input name="rol_usu" type="hidden" value="<?php echo $row['rolusu'];?>"/>
					<input type="submit" id="BSubmit" value="Borrar"/>
				</form>																							
			</div>
			<!---->						
		</div>
	</body>		
</html>	