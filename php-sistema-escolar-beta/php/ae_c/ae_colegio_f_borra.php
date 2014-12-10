<?php
	require_once("../php_default.php");
   	$query="select c.idcol,c.nomcol,ae.idanio,ae.nomanio 
   				from colegio c, 
   					 anio_escolar ae, 
   					 ae_colegio aec 
   				where c.idcol=aec.idcol
   				and ae.idanio=aec.idanio
   				and aec.idcol=".$_REQUEST['id_col'].
   			" and aec.idanio=".$_REQUEST['id_anio'];	
   	$result=mysql_query($query, $link) or die(mysql_error());	
   	$row=mysql_fetch_array($result);
?>
<!DOCTYPE HTML>
<html>		
	<head>
		<title>Años Escolares/Colegio</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_ae_colegio.css" media="screen"/>
		<script type="text/javascript" src="../../js/js_default.js"></script>
		<script type="text/javascript" src="../../js/js_ae_colegio.js"></script>
	</head>

	<body>
		<div class="DivGeneral4">
			<!---->
			<div class="DivTitulo">				
				<a href="ae_colegio.php?id_col=<?php echo $row[0];?>" id="linkAtras">Atras</a>				
				<strong>Borra Año Escolar/Colegio</strong>
			</div>
			<!---->
			<div class="DivPanelData">
				<form action="ae_colegio_p_borra.php" method="post">
					<?php
						echo "¿Esta seguro de borrar a: ".$row['nomanio']." de ".$row['nomcol']."?<br>";
					?>					
					<input name="id_col" type="hidden" value="<?php echo $row['idcol'];?>"/>
					<input name="id_anio" type="hidden" value="<?php echo $row['idanio'];?>"/>
					<input name="eliminar" type="submit" value="Borrar"/>
				</form>
			</div>
			<!---->
		</div>
	</body>
</html>