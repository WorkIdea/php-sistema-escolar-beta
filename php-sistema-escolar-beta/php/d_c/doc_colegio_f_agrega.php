<?php
	require_once("../php_default.php");
	$query="select * from colegio where idcol=".$_REQUEST['id_col'];
   	$result=mysql_query($query, $link) or die(mysql_error());
   	$row=mysql_fetch_row($result);

	$query="select * from anio_escolar where idanio=".$_REQUEST['id_anio'];
	$result2=mysql_query($query, $link) or die(mysql_error());
	$row2=mysql_fetch_row($result2);
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
	<body onload="ValidaFormaEdita()">
		<div class="DivGeneral2">
			<!---->
			<div class="DivTitulo">
				<a href="doc_colegio.php?id_col=<?php echo $row[0];?>" id="linkAtras">Atras</a>
				<strong>Agrega Docentes/Colegio</strong>							
			</div>
			<!---->			
			<div class="DivPanelData">
				<form action="doc_colegio_p_agrega.php" onsubmit="return ValidaCampos();" method="post">
					<label>ID</label><br>
					<input type="text" name="idcol" id="idcol" value="<?php echo $row[0];?>"><br>
					<label>Colegio</label><br>
					<input type="text" name="nomcol" id="nomcol" value="<?php echo $row[1];?>" onKeyUp="this.value=this.value.toUpperCase();"><br>									
					<label>ID</label><br>
					<input type="text" name="idanio" id="idanio" value="<?php echo $row2[0];?>"><br>
					<label>Año Escolar</label><br>
					<input type="text" name="nomanio" id="nomanio" value="<?php echo $row2[1];?>" onKeyUp="this.value=this.value.toUpperCase();"><br>									
					<label>Asignatura</label><br>
					<select name="idasig" id="idasig">
					<option value="-">-</option> 
						<?php
							$query="select * from asignatura a
										where not exists (select 1 from doc_asig_ae_colegio b
															where a.idasig=b.idasig
															and idcol=".$row[0]."
															and idanio=".$row2[0].")
										and exists(select 1 from asignatura_ae c 
													where a.idasig=c.idasig 
													and idanio=".$row2[0].")";
	   						$result=mysql_query($query, $link) or die(mysql_error());
	   						$totEmp=mysql_num_rows($result); 
							if ($totEmp>0){
								while ($rowEmp = mysql_fetch_assoc($result)){	
								 echo "<option value='".$rowEmp['idasig']."'>".$rowEmp['nomasig']."</option>";
								}	
							}
						?>
					</select><br>	
					<label>Docente</label><br>
					<select name="iddoc" id="iddoc">
					<option value="-">-</option> 						
						<?php 
							$query="select * from usuario_info ui
										where exists(select 1 from usuario_rol ur
														where ur.idusu=ui.idusu
														and rolusu='DOC')
										and not exists(select 1 from doc_asig_ae_colegio uc
														where uc.iddoc=ui.idusu
														and idcol=".$row[0].")";
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