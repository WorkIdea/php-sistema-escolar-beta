<!DOCTYPE HTML>
<html>		
	<head>
		<title>Perfil de Usuario: Docente</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../../css/css_user_doc.css" media="screen"/>
		<script type="text/javascript" src="../../../js/js_default.js"></script>
		<script type="text/javascript" src="../../../js/js_user_doc.js"></script>		
	</head>
	<body onload="ValidaFormaEdita()">
		<a href='user_asig_calif.php?id_col=<?php echo $_REQUEST['id_col'];?>&id_anio=<?php echo $_REQUEST['id_anio'];?>&id_doc=<?php echo $_REQUEST['id_doc'];?>&id_asig=<?php echo $_REQUEST['id_asig'];?>' id='linkEntra'><< Atras</a><br>
		<div class="DivGeneral">
			<div class="DivInfoUser">
				<strong>Datos del Alumno</strong>
				<blockquote>
				<?php
					require_once("../../php_default.php");
					$query="select * from usuario_info where idusu=".$_REQUEST['id_alu'];
					$result=mysql_query($query, $link) or die(mysql_error());
					$row=mysql_fetch_row($result);

					echo "Identificacion: ".$row[1]." - ".$row[2]."<br>";
					echo "Nombre: ".$row[3]." ".$row[4]."<br>";

					/*
						id_col=$_REQUEST[id_col]&
						id_anio=$_REQUEST[id_anio]&
						id_doc=$_REQUEST[id_doc]&
						id_asig=$row[0]&
						id_alu=$rowEmp[idalu]
					*/
					$query="select * from calif_asig_alu_lapso where idalu=$_REQUEST[id_alu] and idasig=$_REQUEST[id_asig]";
					$result2=mysql_query($query, $link) or die(mysql_error());
					//$row2=mysql_fetch_row($result2);
					$totEmp2=mysql_num_rows($result2);

					$lap1="";
					$lap2="";
					$lap3="";

					if ($totEmp2>0) {
						while ($rowEmp2 = mysql_fetch_assoc($result2)){
							if ($rowEmp2['idlap'] == 1){
								$lap1=$rowEmp2['calif'];
							}
							elseif ($rowEmp2['idlap'] == 2) {
								$lap2=$rowEmp2['calif'];
							}
							else{
								$lap3=$rowEmp2['calif'];
							}									
						}
					}
				?>
				</blockquote>
			</div>
			<div class="DivInfoColegio">
				<form action="calif_p_edita.php" onsubmit="return ValidaCampos();" method="post">
					<label>Calificaciones:</label><br>
					

					<label>Lapso 1:</label><input type="text" name="calif1" id="calif1" size="5" onkeypress="return isNumberKey(event)" value="<?php echo $lap1;?>"><br>
					<label>Lapso 2:</label><input type="text" name="calif2" id="calif2" size="5" onkeypress="return isNumberKey(event)" value="<?php echo $lap2;?>"><br>
					<label>Lapso 3:</label><input type="text" name="calif3" id="calif3" size="5" onkeypress="return isNumberKey(event)" value="<?php echo $lap3;?>"><br>

					<input name="id_col" type="hidden" value="<?php echo $_REQUEST['id_col'];?>"/>
					<input name="id_anio" type="hidden" value="<?php echo $_REQUEST['id_anio'];?>"/>

					<input name="id_doc" type="hidden" value="<?php echo $_REQUEST['id_doc'];?>"/>
					<input name="id_asig" type="hidden" value="<?php echo $_REQUEST['id_asig'];?>"/>

					<input name="id_alu" type="hidden" value="<?php echo $_REQUEST['id_alu'];?>"/>

					<input type="submit" value="Editar">
				</form>
			</div>
		</div>
	</body>		
</html		