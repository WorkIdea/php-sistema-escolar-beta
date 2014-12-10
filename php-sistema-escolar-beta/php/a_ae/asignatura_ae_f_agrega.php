<?php
	require_once("../php_default.php");
	$query="select * from anio_escolar where idanio=".$_REQUEST['id_anio'];
   	$result=mysql_query($query, $link) or die(mysql_error());
   	$row=mysql_fetch_row($result); 	
?>
<!DOCTYPE HTML>
<html>		
	<head>
		<title>Asignaturas/Año Escolar</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_asignatura_ae.css" media="screen"/>
		<script type="text/javascript" src="../../js/js_default.js"></script>
		<script type="text/javascript" src="../../js/js_asignatura_ae.js"></script>
	</head>
	<body onload="ValidaFormaEdita()">
		<div class="DivGeneral2">
			<!---->
			<div class="DivTitulo">
				<a href="asignatura_ae.php?id_anio=<?php echo $row[0];?>" id="linkAtras">Atras</a>
				<strong>Agrega Asignatura/Año Escolar</strong>						
			</div>
			<!---->			
			<div class="DivPanelData">
				<form action="asignatura_ae_p_agrega.php" onsubmit="return ValidaCampos();" method="post">
					<label>ID</label><br>
					<input type="text" name="idanio" id="idanio" value="<?php echo $row[0];?>"><br>
					<label>Nombre</label><br>
					<input type="text" name="nomanio" id="nomanio" value="<?php echo $row[1];?>" onKeyUp="this.value=this.value.toUpperCase();"><br>
					<label>Asignatura</label><br>
					<select name="idasig" id="idasig">
					<option value="-">-</option> 
						<?php
							$query="select * from asignatura a 
										where not exists 
											(select 1 from asignatura_ae aea
												where aea.idasig=a.idasig 
												and idanio=".$row[0].")";
	   						$result=mysql_query($query, $link) or die(mysql_error());
	   						$totEmp=mysql_num_rows($result); 
							if ($totEmp>0){
								while ($rowEmp = mysql_fetch_assoc($result)){	
								 echo "<option value='".$rowEmp['idasig']."'>".$rowEmp['nomasig']."</option>";
								}	
							}
						?>
					</select><br>					
					<input type="submit" value="Agregar">																			
				</form>									
			</div>
			<!---->						
		</div>
	</body>		
</html>