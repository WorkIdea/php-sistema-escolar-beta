<!DOCTYPE HTML>
<html>		
	<head>
		<title>Autentificacion</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="css/css_index.css" media="screen"/>
		<script type="text/javascript" src="js/js_default.js"></script>
		<script type="text/javascript" src="js/js_index.js"></script>		
	</head>
	<body onload="ValidaForma()">				
		<div class="DivGeneral">
			<!---->						
			<div class="DivLogo">
				<img class="Logo" src="img/img_logo.png"/>
			</div>				
			<!---->						
			<div class="DivLogin">				
				<form action="php/user/user_p_entra.php" method="post" onsubmit="return ValidaCampos()" >
					<label><strong>Tipo y Numero de Identificacion</strong></label><br>
					<select name="tipoid" id="tipoid">
					<option value="-">-</option> 
						<?php
							require_once("php/php_default.php");
							$query='select * from tab_central where tipotab = "TIPOID" order by 2';
	   						$result=mysql_query($query, $link) or die(mysql_error());
	   						$totEmp=mysql_num_rows($result); 
							if ($totEmp>0){
								while ($rowEmp = mysql_fetch_assoc($result)){	
								 echo "<option value='".$rowEmp['codtab']."'>".$rowEmp['codtab']."</option>";
								}	
							}
						?>
					</select>												
					<input type="text" name="numid" id="numid" required="required" size="20" maxlength="8" onkeypress="return isNumberKey(event)"><br>
					<label><strong>Contraseña</strong></label><br>
					<input type="password" name="passusu" id="passusu" required="required" size="18" maxlength="8">										
					<input type="submit" id="BSubmit" value="Entrar">											
				</form>	
			</div>
			<!---->			
			<div>
				<a href="php/admin.php"><strong>Solo Administradores</strong></a>
			</div>
			<!---->
		</div>
	</body>
</html>