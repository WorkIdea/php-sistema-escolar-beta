<?php
	require_once("../php_default.php");
	$query="select * from usuario_info where idusu=".$_REQUEST['id_usu'];
   	$result=mysql_query($query, $link) or die(mysql_error());
   	$row=mysql_fetch_row($result);		
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
		<div class="DivGeneral2">
			<!---->
			<div class="DivTitulo">				
				<a href="usuario_rol.php?id_usu=<?php echo $row[0];?>" id="linkAtras">Atras</a>
				<strong>Agrega Rol de Usuario</strong><br>											
			</div>
			<!---->			
			<div class="DivPanelData">
				<form action="usuario_rol_p_agrega.php" onsubmit="return ValidaCampos();" method="post">
					<label>ID</label><br>
					<input type="text" name="idusu" id="idusu" value="<?php echo $row[0];?>"><br>
					<label>Tipo y Numero de Identificacion</label><br>
					<select name="tipoid" id="tipoid"> 
						<option value="<?php echo $row[1];?>"><?php echo $row[1];?></option>
					</select>												
					<input type="text" name="numid" id="numid" value="<?php echo $row[2];?>" onkeypress="return isNumberKey(event)"><br>
					<label>Nombre</label><br>
					<input type="text" name="nomusu" id="nomusu" value="<?php echo $row[3]." ".$row[4];?>" onKeyUp="this.value=this.value.toUpperCase();"><br>
					<label>Roles</label><br>
					<select name="rolusu" id="rolusu">
					<option value="-">-</option> 
						<?php
						$query="select * from tab_central where tipotab='ROLUSU'";														
	   						$result=mysql_query($query, $link) or die(mysql_error());
	   						$totEmp=mysql_num_rows($result); 

							if ($totEmp>0){
								while ($rowEmp = mysql_fetch_assoc($result)){
									$query="select * from usuario_rol where idusu=".$row[0];//." and rolusu='".$rowEmp['codtab']."'";	
		   							$result2=mysql_query($query, $link) or die(mysql_error());
		   							$totEmp2=mysql_num_rows($result2);  	
		   							$row2=mysql_fetch_row($result2);	

									if ($totEmp2==0){
										echo "<option value='".$rowEmp['codtab']."'>".$rowEmp['desctab']."</option>";	
									}
									elseif($totEmp2==1){										
										if ($row2[1]=='REP'){
											echo "<option value='DOC'>DOCENTE</option>";
											break;
										} 
										elseif ($row2[1]=='DOC'){
											echo "<option value='REP'>REPRESENTANTE</option>";
											break;
										}
									}								
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