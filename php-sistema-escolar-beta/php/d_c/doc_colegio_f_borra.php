<?php
	require_once("../php_default.php");	
	$query="select * from colegio where idcol=".$_REQUEST['id_col'];
   	$result=mysql_query($query, $link) or die(mysql_error());
   	$row=mysql_fetch_row($result);

	$query="select * from anio_escolar where idanio=".$_REQUEST['id_anio'];
	$result2=mysql_query($query, $link) or die(mysql_error());
	$row2=mysql_fetch_row($result2);   	

	$query="select * from asignatura where idasig=".$_REQUEST['id_asig'];
	$result3=mysql_query($query, $link) or die(mysql_error());
	$row3=mysql_fetch_row($result3);  	

	$query="select * from usuario_info where idusu=".$_REQUEST['id_doc'];
	$result4=mysql_query($query, $link) or die(mysql_error());
	$row4=mysql_fetch_row($result4);	
?>
<!DOCTYPE HTML>
<html>		
	<head>
		<title>Docentes/Colegio</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_doc_colegio.css" media="screen"/>		
		<script type="text/javascript" src="../../js/js_default.js"></script>
		<script type="text/javascript" src="../../js/js_doc_colegio.js"></script>
	</head>

	<body>
		<div class="DivGeneral4">
			<!---->
			<div class="DivTitulo">				
				<a href="doc_colegio.php?id_col=<?php echo $_REQUEST['id_col'];?>" id="linkAtras">Atras</a>
				<strong>Borra Docentes/Colegio</strong>
			</div>
			<!---->
			<div class="DivPanelData">
				<form action="doc_colegio_p_borra.php" method="post">
					<?php
						echo "¿Esta seguro de borrar a: ".$row4[3]." ".$row4[4]." de ".$row[1]."?<br>";
					?>					
					<input name="id_col" type="hidden" value="<?php echo $row[0];?>"/>
					<input name="id_anio" type="hidden" value="<?php echo $row2[0];?>"/>
					<input name="id_asig" type="hidden" value="<?php echo $row3[0];?>"/>
					<input name="id_doc" type="hidden" value="<?php echo $row4[0];?>"/>
					<input name="eliminar" type="submit" value="Borrar"/>
				</form>
			</div>
			<!---->
		</div>
	</body>
</html>