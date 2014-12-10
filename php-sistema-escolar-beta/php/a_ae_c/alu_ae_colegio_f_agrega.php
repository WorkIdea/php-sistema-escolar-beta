<?php
	require_once("../php_default.php");
	$query="select c.idcol,nomcol,ae.idanio,nomanio from colegio c,ae_colegio aec,anio_escolar ae
				where c.idcol=aec.idcol
   				and ae.idanio=aec.idanio
   				and aec.idcol=".$_REQUEST['id_col'].
   				" and aec.idanio=".$_REQUEST['id_anio'];
   	$result=mysql_query($query, $link) or die(mysql_error());
   	$row=mysql_fetch_row($result); 
?>
<!DOCTYPE HTML>
<html>		
	<head>
		<title>Alumnos/Año Escolar/Colegios</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_alu_ae_colegio.css" media="screen"/>
		<script type="text/javascript" src="../../js/js_default.js"></script>
		<script type="text/javascript" src="../../js/js_alu_ae_colegio.js"></script>		
	</head>
	<body  onload="ValidaFormaEdita()">
		<div class="DivGeneral2">
			<!---->
			<div class="DivTitulo">					
				<a href="alu_ae_colegio.php?id_col=<?php echo $row[0];?>" id="linkAtras">Atras</a>
				<strong>Agrega Alumno</strong>
			</div>
			<!---->			
			<div class="DivPanelData">		
				<form action="alu_ae_colegio_p_agrega.php" onsubmit="return ValidaCampos();" method="post">
					<label>ID</label><br>
					<input type="text" name="idcol" id="idcol" value="<?php echo $row[0];?>"><br>
					<label>Nombre</label><br>
					<input type="text" name="nomcol" id="nomcol" value="<?php echo $row[1];?>" onKeyUp="this.value=this.value.toUpperCase();"><br>
					<label>ID</label><br>
					<input type="text" name="idanio" id="idanio" value="<?php echo $row[2];?>"><br>
					<label>Año Escolar</label><br>
					<input type="text" name="nomanio" id="nomanio" value="<?php echo $row[3];?>" onKeyUp="this.value=this.value.toUpperCase();"><br>					
					<label>Alumno</label><br>
					<select name="idalu" id="idalu">
					<option value="-">-</option> 
						<?php						
							$query="select * from usuario_info where idusu in(select idalu from alu_rep ar
										where exists(select 1 from rep_colegio uc
														where uc.idrep=ar.idrep
														and uc.idcol=".$row[0].")".
									"and not exists(select 1 from alu_ae_colegio aec
														where aec.idalu=ar.idalu))";
	   						$result=mysql_query($query, $link) or die(mysql_error());
	   						$totEmp=mysql_num_rows($result); 
							if ($totEmp>0){
								while ($rowEmp = mysql_fetch_assoc($result)){	
								 echo "<option value='".$rowEmp['idusu']."'>".$rowEmp['nomusu']." ".$rowEmp['apeusu']."</option>";
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