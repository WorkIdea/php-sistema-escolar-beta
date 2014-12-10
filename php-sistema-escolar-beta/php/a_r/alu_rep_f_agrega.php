<?php
	require_once("../php_default.php");
	$query="select * from usuario_info where idusu=".$_REQUEST['id_rep'];
   	$result=mysql_query($query, $link) or die(mysql_error());
   	$row=mysql_fetch_row($result);
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
		<div class="DivGeneral2">
			<!--prueba.thcs.com.ve-->
			<div class="DivTitulo">
				<a href="alu_rep.php" id="linkAtras">Atras</a>
				<strong>Agrega Alumnos/Representante</strong>							
			</div>
			<!---->			
			<div class="DivPanelData">
				<form action="alu_rep_p_agrega.php" onsubmit="return ValidaCampos();" method="post">
					<label>ID</label><br>
					<input type="text" name="idrep" id="idrep" value="<?php echo $row[0];?>"><br>
					<label>Tipo y Numero de Identificacion</label><br>
					<select name="tipoid" id="tipoid"> 
						<option value="<?php echo $row[1];?>"><?php echo $row[1];?></option>
					</select>												
					<input type="text" name="numid" id="numid" value="<?php echo $row[2];?>" onkeypress="return isNumberKey(event)"><br>
					<label>Nombre</label><br>
					<input type="text" name="nomusu" id="nomusu" value="<?php echo $row[3]." ".$row[4];?>" onKeyUp="this.value=this.value.toUpperCase();"><br>
					<label>Alumno</label><br>
					<select name="idalu" id="idalu">
					<option value="-">-</option> 
						<?php
							$query="select * from usuario_info ui
										where exists(select 1 from usuario_rol ur
														where ur.idusu=ui.idusu
														and rolusu='ALU')
										and not exists(select 1 from alu_rep uc
															where uc.idalu=ui.idusu)";
															/*and rolusu='ALU'
										and idcol=".$row[0].")";*/

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