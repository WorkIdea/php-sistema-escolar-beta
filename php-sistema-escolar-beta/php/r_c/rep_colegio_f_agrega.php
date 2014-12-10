<?php
	require_once("../php_default.php");
	$query="select * from colegio where idcol=".$_REQUEST['id_col'];;
   	$result=mysql_query($query, $link) or die(mysql_error());
   	$row=mysql_fetch_row($result);
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
	<body onload="ValidaFormaEdita()">
		<div class="DivGeneral2">
			<!---->
			<div class="DivTitulo">
				<a href="rep_colegio.php?id_col=<?php echo $row[0];?>" id="linkAtras">Atras</a>
				<strong>Agrega Representantes/Colegio</strong>							
			</div>
			<!---->			
			<div class="DivPanelData">
				<form action="rep_colegio_p_agrega.php" onsubmit="return ValidaCampos();" method="post">
					<label>ID</label><br>
					<input type="text" name="idcol" id="idcol" value="<?php echo $row[0];?>"><br>
					<label>Nombre</label><br>
					<input type="text" name="nomcol" id="nomcol" value="<?php echo $row[1];?>" onKeyUp="this.value=this.value.toUpperCase();"><br>									
					<label>Representante</label><br>
					<select name="idusu" id="idusu">
					<option value="-">-</option> 
						<?php
							$query="select * from usuario_info ui
										where exists(select 1 from usuario_rol ur
														where ur.idusu=ui.idusu
														and rolusu='REP')
										and not exists(select 1 from rep_colegio uc
															where uc.idrep=ui.idusu
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