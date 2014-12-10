<?php
	require_once("../php_default.php");
   	$query="select c.idcol,c.nomcol,ui.idusu,ui.nomusu,ui.apeusu
   				from colegio c, 
   					 usuario_info ui,
   					 rep_colegio rc
   				where c.idcol=rc.idcol
				and ui.idusu=rc.idrep
				and c.idcol =".$_REQUEST['id_col'].
				" and rc.idrep=".$_REQUEST['id_usurep'];
   	$result=mysql_query($query, $link) or die(mysql_error());	
   	$row=mysql_fetch_array($result);
?>
<!DOCTYPE HTML>
<html>		
	<head>
		<title>Representantes/Colegio</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_rep_colegio.css" media="screen"/>	
		<script type="text/javascript" src="../../js/js_default.js"></script>
		<script type="text/javascript" src="../../js/js_rep_colegio.js"></script>
	</head>
	<body>
		<div class="DivGeneral4">
			<!---->
			<div class="DivTitulo">				
				<a href="rep_colegio.php?id_col=<?php echo $row[0];?>" id="linkAtras">Atras</a>
				<strong>Borra Representantes/Colegio</strong>		
			</div>
			<!---->
			<div class="DivPanelData">
				<form action="rep_colegio_p_borra.php" method="post">
					<?php
						echo "¿Esta seguro de borrar a: ".$row['nomusu']." ".$row['apeusu']." de ".$row['nomcol']."?<br>";
					?>					
					<input name="id_col" type="hidden" value="<?php echo $row['idcol'];?>"/>
					<input name="id_rep" type="hidden" value="<?php echo $row['idusu'];?>"/>
					<input name="eliminar" type="submit" value="Borrar"/>
				</form>
			</div>
			<!---->
		</div>
	</body>
</html>