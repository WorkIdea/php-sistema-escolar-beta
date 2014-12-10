<!DOCTYPE HTML>
<html>		
	<head>
		<title>Perfil de Usuario: Docente</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../../css/css_user_doc.css" media="screen"/>	
		<script type="text/javascript" src="../../../js/js_default.js"></script>
		<script type="text/javascript" src="../../../js/js_asistencia.js"></script>					
	</head>
	<body>
		<a href='user_asig_asist_fecha.php?id_col=<?php echo $_REQUEST['id_col'];?>&id_anio=<?php echo $_REQUEST['id_anio'];?>&id_doc=<?php echo $_REQUEST['id_doc'];?>&id_asig=<?php echo $_REQUEST['id_asig'];?>&id_fecha=<?php echo $_REQUEST['id_fecha'];?>' id='linkEntra'><< Atras</a><br>
		<div class="DivGeneral">
			<!---->			
			<div class="DivInfoUser">				
				<strong>Datos de Asignatura</strong>
				<blockquote>
				<?php
					require_once("../../php_default.php");
					$query="select * from asignatura where idasig=".$_REQUEST['id_asig'];
					$result=mysql_query($query, $link) or die(mysql_error());
					$row=mysql_fetch_row($result);
					
					echo "Nombre: ".$row[1]."<br>";
					echo "Fecha: ".$_REQUEST['id_fecha']."<br>";					
				?>
				</blockquote>

			</div>
			<!---->			
			<div class="DivInfoColegio">
			<form action="asistencia_p_edita.php" onsubmit="return ValidaCampos();" method="post">		
				<?php
					require_once("../../php_default.php");
					//echo "colegio: ".$_REQUEST['id_col']."<br>";
					//echo "anio: ".$_REQUEST['id_anio']."<br>";
					//echo "id_doc: ".$_REQUEST['id_doc']."<br>";
					//echo "id_alu: ".$_REQUEST['id_alu']."<br>";
					//echo "id_asig: ".$_REQUEST['id_asig']."<br>";
					//echo "id_fecha: ".$_REQUEST['id_fecha']."<br>";		
					echo "<label>¿Asistio el alumno ese dia?</label><br>";

					$check="";			
					$check2="";	
					$valor="";					
					if($_REQUEST['id_asis']=="S"){ 
						$check = "checked";
					}
					else if($_REQUEST['id_asis']=="N"){
						$check2 = "checked";
					}

					echo "<input type='radio' name='asist' value='S' $check>Si";
					echo "<input type='radio' name='asist' value='N' $check2>No";	

					echo "<input name='id_col' type='hidden' value=$_REQUEST[id_col]>";
					echo "<input name='id_alu' type='hidden' value=$_REQUEST[id_alu]>";
					echo "<input name='id_asig' type='hidden' value=$_REQUEST[id_asig]>";					
					echo "<input name='id_fecha' type='hidden' value=$_REQUEST[id_fecha]>";	
					echo "<input name='id_anio' type='hidden' value=$_REQUEST[id_anio]>";	
					echo "<input name='id_doc' type='hidden' value=$_REQUEST[id_doc]>";	
				?>
				<input type="submit" value="Modificar">
			</form>
			</div>
		</div>
	</body>		
</html>